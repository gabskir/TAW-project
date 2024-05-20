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

// Get article ID from query parameter
$article_id = isset($_GET['article_id']) ? (int)$_GET['article_id'] : 1;

// Handle upvote form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upvote'])) {
    $upvote_sql = "UPDATE articles SET upvotes = upvotes + 1 WHERE id = ?";
    $stmt = $conn->prepare($upvote_sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $stmt->close();
}

// Handle question form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ask_question'])) {
    $question = $_POST['question'];
    $question_sql = "INSERT INTO questions (article_id, question) VALUES (?, ?)";
    $stmt = $conn->prepare($question_sql);
    $stmt->bind_param("is", $article_id, $question);
    $stmt->execute();
    $stmt->close();
}

// Fetch article details
$article_sql = "SELECT a.title, a.content, a.publish_date, a.upvotes, au.name, au.email 
                FROM articles a 
                JOIN authors au ON a.author_id = au.id 
                WHERE a.id = ?";
$stmt = $conn->prepare($article_sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $article = $result->fetch_assoc();
} else {
    die("Article not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <table border="1">
        <tr>
            <th>Author</th>
            <td><?php echo htmlspecialchars($article['name']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($article['email']); ?></td>
        </tr>
        <tr>
            <th>Publish Date</th>
            <td><?php echo htmlspecialchars($article['publish_date']); ?></td>
        </tr>
        <tr>
            <th>Content</th>
            <td><?php echo nl2br(htmlspecialchars($article['content'])); ?></td>
        </tr>
        <tr>
            <th>Upvotes</th>
            <td><?php echo htmlspecialchars($article['upvotes']); ?></td>
        </tr>
    </table>

    <h2>Upvote this article</h2>
    <form method="post">
        <input type="hidden" name="upvote" value="1">
        <button type="submit">Upvote</button>
    </form>

    <h2>Ask a Question</h2>
    <form method="post">
        <label for="question">Your Question:</label><br>
        <textarea name="question" id="question" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="ask_question" value="1">
        <button type="submit">Submit Question</button>
    </form>
</body>
</html>
