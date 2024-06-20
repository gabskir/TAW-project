<?php
session_start();

$fileName = $_POST['file'];

// Database connection
$servername = "localhost";
$dbUsername = "global";
$dbPassword = "placeholderPassworD";
$dbname = "backoffice";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action = $_POST['action'];

    if ($action == 'login') {
        // Verify credentials
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['pwd'])) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login successful!'); window.location.href = '$fileName';</script>";
            } else {
                echo "<script>alert('Invalid username or password.'); window.location.href = '$fileName';</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password.'); window.location.href = '$fileName';</script>";
        }

        $stmt->close();
    } elseif ($action == 'register') {
        // Check if the username already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already taken.'); window.location.href = '$fileName';</script>";
        } else {
            // Insert new user into the database with hashed password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, pwd) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashedPassword);
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Registration successful!'); window.location.href = '$fileName';</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again.'); window.location.href = '$fileName';</script>";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>
