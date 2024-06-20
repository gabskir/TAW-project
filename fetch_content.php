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

// Set the case ID (this could come from a query parameter, user input, etc.)
$case_id = isset($_GET['case_id']) ? (int)$_GET['case_id'] : 1;

// Fetch content based on the case ID
$sql = "SELECT * FROM content_area WHERE case_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $case_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $paragraph = $row['paragraph'];
;
} else {
    // Default content if no matching case is found
    $fullTitle = "Database";
    $publishDate = "Does not work";
}

$stmt->close();
$conn->close();
?>
