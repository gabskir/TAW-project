<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "articles_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles
$sql = "SELECT a.id, a.title, au.name AS author_name, a.pdf_link
        FROM articles a 
        JOIN authors au ON a.author_id = au.id";
$result = $conn->query($sql);

$articles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

$conn->close();
?>
