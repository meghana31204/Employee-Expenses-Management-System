<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vouchers</title>
    <link rel="stylesheet" href="admin_managevouch.css">
    <script src="admin_managevouch.js"></script>
</head>
<body>
    <div class="header">
        <h2><a href="#">E<sup>2</sup>MS</a></h2>
    </div>
    <div class="navbar">
        <div class="nav-items">
            <ul>
                <li><a href="admin_overview.html">Overview</a></li>
                <li><a href="admin_managevouch.php">Manage Vouchers</a></li>
                <li><a href="admin_teams.html">Team</a></li>
                <li><a href="admin_settings.html">Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="center1">
        <h1>Manage Vouchers</h1>
    </div>
    <div class="center">
        <div class="filter-section">
            <input type="text" id="search" placeholder="Search by Voucher ID or Employee Name" class="search-input">
            <select id="status-filter" class="status-filter">
                <option value="">Filter by Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            <button class="filter-btn">Filter</button>
        </div>

        <div class="recent">
            <h3>Vouchers</h3>
            <table id="voucher-table">
                <thead>
                    <tr>
                        <th>Voucher ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Proceed</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Database connection
                $mysqli = new mysqli("localhost", "root", "", "wad");

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Check if "Proceed" button is clicked
                if (isset($_GET['proceed'])) {
                    $voucher_id = $_GET['proceed'];
                    // Update the status to "Payment Successful" (or you can add custom message as needed)
                    $updateQuery = "UPDATE `voucher` SET `status` = 'Payment Successful' WHERE `id` = '$voucher_id'";
                    $mysqli->query($updateQuery);
                    echo "<p>Payment Successful for Voucher ID: $voucher_id</p>";
                }

                // Fetch all vouchers (you can add filters if needed)
                $query = "SELECT * FROM `voucher`";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td><a href='admin_managevouch.php?proceed=" . $row['id'] . "' class='proceed-btn'>Proceed</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No vouchers found.</td></tr>";
                }

                $mysqli->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>© 2024 E<sup>2</sup>MS | Manage Vouchers</p>
    </footer>
</body>
</html>
