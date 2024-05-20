<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "content_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the case ID (this could come from a query parameter, user input, etc.)
$case_id = isset($_GET['case_id']) ? (int)$_GET['case_id'] : 1;

// Fetch content based on the case ID
$sql = "SELECT * FROM content WHERE case_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $case_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mainContentTitle = $row['main_title'];
    $articleTitle = $row['article_title'];
    $articleParagraph1 = $row['article_paragraph1'];
    $articleParagraph2 = $row['article_paragraph2'];
    $asideTitle = $row['aside_title'];
    $asideContent = $row['aside_content'];
} else {
    // Default content if no matching case is found
    $mainContentTitle = "Default Main Content Area";
    $articleTitle = "Default Article Title";
    $articleParagraph1 = "This is the default first paragraph of the article.";
    $articleParagraph2 = "This is the default second paragraph of the article.";
    $asideTitle = "Default Important Information";
    $asideContent = "This is some default important information.";
}

$stmt->close();
$conn->close();
?>
