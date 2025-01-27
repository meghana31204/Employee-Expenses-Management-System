<?php
$servername = "localhost";  // Change to your server name if different
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "wad";            // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voucherDate = $_POST['voucherDate'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $query = "INSERT INTO voucher (voucher_date, category, amount, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssds", $voucherDate, $category, $amount, $description);
    
    if ($stmt->execute()) {
        $message = "Voucher submitted successfully!";
    } else {
        $message = "Error submitting voucher: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Entry</title>
    <link rel="stylesheet" href="voucher_entry.css">
</head>
<body>
    <div class="container">
        <h1>Voucher Entry Form</h1>
        <form method="POST" id="voucherForm">
            <div class="form-group">
                <label for="voucherDate">Date:</label>
                <input type="date" id="voucherDate" name="voucherDate" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Travel">Travel</option>
                    <option value="Office Supplies">Office Supplies</option>
                    <option value="Meals">Meals</option>
                    <option value="Client Meeting">Client Meeting</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe the expense" required></textarea>
            </div> 
            <button type="submit" class="submit-btn">Submit Voucher</button>
        </form>
    </div>

    <?php if ($message != ""): ?>
        <script type="text/javascript">
            alert("<?php echo $message; ?>");
        </script>
    <?php endif; ?>
</body>
</html>
