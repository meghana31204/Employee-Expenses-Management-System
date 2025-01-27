<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="signupWAD.css">
</head>
<body>
    <div class="main">
        <div class="signup_form">
            <h2>Sign up</h2>
            <form id="registerForm" method="post">
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Email</label>
                <input type="email" name="email" required>
                <label>Create Password</label>
                <input type="password" name="create" required>
                <label>Confirm Password</label>
                <input type="password" name="confirm" required>
                <p>Sign up as
                    <select id="role" name="role" required>
                        <option value="">--select--</option>
                        <option value="employee">Employee</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                    </select>
                </p>
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>
    </div>
    
    <?php
    if (isset($_POST['submit'])) {
        // Collect form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $create_password = $_POST['create'];
        $confirm_password = $_POST['confirm'];
        $role = $_POST['role'];
        
        // Check if passwords match
        if ($create_password === $confirm_password) {
            // Create database connection
            $mysqli = new mysqli("localhost", "root", "", "wad");

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Prepare the SQL query to insert data into wad_login table
            $insertQuery = "INSERT INTO `wad_login`(`email`, `password`) VALUES ('$email', '$create_password')";

            // Execute the query
            if ($mysqli->query($insertQuery) === TRUE) {
                echo "<p>Account successfully created!</p>";
                // Redirect based on role (optional)
                if ($role === 'employee') {
                    echo "<script>window.location.href = 'emp_dashboard.html';</script>";
                } else if ($role === 'manager') {
                    echo "<script>window.location.href = 'supervisor_dashboard.html';</script>";
                } else if ($role === 'admin') {
                    echo "<script>window.location.href = 'admin_dashboard.html';</script>";
                }
            } else {
                echo "Error: " . $insertQuery . "<br>" . $mysqli->error;
            }

            // Close the connection
            $mysqli->close();
        } else {
            echo "<p>Passwords do not match! Please try again.</p>";
        }
    }
    ?>

</body>
</html>
