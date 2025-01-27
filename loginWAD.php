<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginWAD.css">
</head>
<body>
    <div class="main">
        <div class="loginform">
            <h2>Login</h2>
            <form action="" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" name="login_Btn">Login</button>
                <a href="#">Forgot your password?</a>
            </form>
        </div>
    </div>

    <?php
    // Connect to MySQL using MySQLi
    $conn = new mysqli("localhost", "root", "", "wad");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if login button is pressed
    if (isset($_POST['login_Btn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SQL Query to fetch user details
        $sql = "SELECT * FROM wad_login WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $resultPassword = $row['password'];

            // Verify password
            if ($password === $resultPassword) {
                // Redirect based on email or role
                if ($email === "22951a1249@iare.ac.in") {
                    header("Location: supervisor_dashboard.php");
                } elseif ($email === "22951a1250@iare.ac.in") {
                    header("Location: admin_dashboard.html");
                } elseif ($email === "22951a1251@iare.ac.in") {
                    header("Location: emp_dashboard.html");
                } else {
                    header("Location: emp_dashboard.html");
                }
                exit();
            } else {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Email not found. Please register.');</script>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
