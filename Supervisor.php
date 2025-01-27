<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Approval</title>
    <!-- Bootstrap CSS for Table -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="supervisor.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="supervisor.js" ></script>


    <script>
        function showContent(id) {
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('pendingApproval').style.display = 'none';
            document.getElementById('approvedVouchers').style.display = 'none';
            document.getElementById('vouchersHistory').style.display = 'none';
            document.getElementById(id).style.display = 'block';
        }
		function showTextbox(button) {
			var textbox = button.nextElementSibling;
			textbox.style.display = 'block';
		}
    </script>
</head>
<body>
    <header>
        <nav class="navbar">
            <h1 class="logo">E<sup>2</sup>MS</h1>
            <a href="profile.html" ><img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon"></a>
        </nav>
    </header>
    
    <div class="container">
        <div class="sidebar">
            <img class="sidebar-image" src="https://png.pngtree.com/png-clipart/20230227/original/pngtree-an-employee-working-on-his-laptop-png-image_8966790.png" alt="image">
            <ul>
                <li><a href="#" onclick="showContent('dashboard')">Dashboard</a></li>
                <li><a href="#" onclick="showContent('pendingApproval')">Pending Approval</a></li>
                <li><a href="#" onclick="showContent('approvedVouchers')">Approved Vouchers</a></li>
                <li><a href="#" onclick="showContent('vouchersHistory')">Vouchers History</a></li>
            </ul>
        </div>
        
        <div class="main-content">
            <div id="dashboard">
                <h2 class="heading-title">Dashboard</h2>
                <div class="row mt-4">
                    <!-- Total Vouchers Received -->
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Vouchers Received</div>
                            <div class="card-body">
                                <h5 class="card-title">120</h5>
                            </div>
                        </div>
                    </div>
                
                    <!-- Approved Vouchers -->
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">No.of Approved Vouchers</div>
                            <div class="card-body">
                                <h5 class="card-title">80</h5> 

                            </div>
                        </div>
                    </div>
                
                    <!-- Pending Vouchers -->
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">No.of Pending Vouchers</div>
                            <div class="card-body">
                                <h5 class="card-title">30</h5> 
                            </div>
                        </div>
                    </div>
                
                    <!-- Rejected Vouchers -->
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">No.of Rejected Vouchers</div>
                            <div class="card-body">
                                <h5 class="card-title">10</h5> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="pendingApproval" style="display: none;">
    <h2 class="heading-title">Pending Vouchers</h2>
    <div class="table-responsive box-styling">
        <div class="table-header">
            <div class="date-filter">
                <label for="start-date">Start Date:</label>
                <input type="date" id="start-date" name="start-date">
                <label for="end-date">End Date:</label>
                <input type="date" id="end-date" name="end-date">
                <label for="search">Search</label>
                <input type="text" id="search" name="search">
                <button class="btn btn-primary btn-sm">Search</button>
            </div>
        </div>
        <table class="table table-container table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Employee Name</th>
                    <th>Title</th>
                    <th>Submitted Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Receipts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Database connection
$servername = "localhost"; // Your server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "wad"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch vouchers with 'pending' status
$sql = "SELECT id, voucher_date, category, amount, description, status FROM voucher WHERE status = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each row of vouchers
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>"; // Assuming employee name or ID is in 'id' column
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>" . $row["voucher_date"] . "</td>";
        echo "<td>" . $row["amount"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><a href='#' class='btn btn-info btn-sm'>View</a></td>";
        echo "<td>";
        echo "<button class='btn btn-success btn-sm' onclick='approveVoucher()'>Approve</button>";
        echo "<div id='approvalMessage'>Approved <button id='closeButton' onclick='closeMessage()'>Close</button></div>";
        echo "<button class='btn btn-danger btn-sm' onclick='showTextbox(this)'>Reject</button>";
        echo "<div style='display: none;'><input type='text' placeholder='Enter reason'><button class='btn btn-primary btn-sm'>Submit</button></div>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No pending vouchers found.</td></tr>";
}

$conn->close();
?>

            </tbody>
        </table>
        <button class="btn btn-primary btn-sm enable-button">Next</button>
    </div>
</div>

            <div id="approvedVouchers" style="display: none;">
                <h2 class="heading-title">Approved Vouchers</h2>
                <div class="table-responsive box-styling">
                    <div class="table-header">
                        <div class="date-filter">
                            <label for="start-date-approved">Start Date:</label>
                            <input type="date" id="start-date-approved" name="start-date">
                            <label for="end-date-approved">End Date:</label>
                            <input type="date" id="end-date-approved" name="end-date">
                            <label for="search-approved">Search</label>
                            <input type="text" id="search-approved" name="search">
                            <button class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Employee Name</th>
                                <th>Title</th>
                                <th>Submitted Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Expense Date</th>
                                <th>Approved Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Meghana Pavuluri</td>
                                <td>Travel</td>
                                <td>10-10-2024</td>
                                <td>40000/-</td>
                                <td>Business trip to Canada</td>
                                <td>1-10-2024</td>
                                <td>2-10-2024</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm enable-button">Next</button>
                </div>
            </div>
            <div id="vouchersHistory" style="display: none;">
                <h2 class="heading-title">Vouchers History</h2>
                <div class="table-responsive box-styling">
                    <div class="table-header">
                        <div class="date-filter">
                            <label for="start-date">Start Date:</label>
                            <input type="date" id="start-date" name="start-date">
                            <label for="end-date">End Date:</label>
                            <input type="date" id="end-date" name="end-date">
                            <label for="search">Search</label>
                            <input type="text" id="search" name="search">
                            <button class="btn btn-primary btn-sm">Search</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Employee Name</th>
                                <th>Title</th>
                                <th>Submitted Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Expended Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Meghana Pavuluri</td>
                                <td>Travel</td>
                                <td>10-10-2024</td>
                                <td>40000/-</td>
                                <td>Business trip to Canada</td>
                                <td>9-10-2024</td>
                                <td>Rejected</td>
                            </tr>
                            <tr>
                                <td>Meghana</td>
                                <td>Purchasing</td>
                                <td>01-10-2024</td>
                                <td>50000/-</td>
                                <td>Software</td>
                                <td>02-10-2024</td>
                                <td>Approved</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm enable-button">Next</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>