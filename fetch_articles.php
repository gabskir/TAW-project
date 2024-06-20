<?php
// Database connection
$servername = "localhost";
$username = "global";
$password = "placeholderPassworD";
$dbname = "backoffice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles
$sql = "SELECT id, title, authors, pdf_link
        FROM articles ";
$result = $conn->query($sql);

$articles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

$conn->close();
?>
