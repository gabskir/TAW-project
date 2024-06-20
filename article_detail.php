<?php
session_start();



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

// Get article ID from query parameter
$article_id = isset($_GET['article_id']) ? (int)$_GET['article_id'] : 1;

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please log in to upvote or ask a question.');</script>";
}

// Handle upvote form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upvote']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $check_upvote_sql = "SELECT * FROM upvotes WHERE article_id = ? AND username = ?";
    $stmt = $conn->prepare($check_upvote_sql);
    $stmt->bind_param("is", $article_id, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $upvote_sql = "UPDATE articles SET upvotes = upvotes + 1 WHERE id = ?";
        $stmt = $conn->prepare($upvote_sql);
        $stmt->bind_param("i", $article_id);
        $stmt->execute();

        $insert_upvote_sql = "INSERT INTO upvotes (article_id, username) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_upvote_sql);
        $stmt->bind_param("is", $article_id, $username);
        $stmt->execute();
    }
    $stmt->close();
}

// Handle question form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ask_question']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $question = $_POST['question'];
    $question_sql = "INSERT INTO questions (article_id, question, username) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($question_sql);
    $stmt->bind_param("iss", $article_id, $question, $username);
    $stmt->execute();
    $stmt->close();
}

// Fetch article details
$article_sql = "SELECT a.authors, c.full_title as title, c.publish_date, a.upvotes, c.paragraph
                FROM articles a 
                JOIN content c ON a.id = c.id 
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
    <script>
        function checkLogin(action) {
            <?php if (!isset($_SESSION['username'])): ?>
                alert('Please log in to ' + action + '.');
                return false;
            <?php else: ?>
                return true;
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <table border="1">
        <tr>
            <th>Author</th>
            <td><?php echo htmlspecialchars($article['authors']); ?></td>
        </tr>
        <tr>
            <th>Publish Date</th>
            <td><?php echo htmlspecialchars($article['publish_date']); ?></td>
        </tr>
        <tr>
            <th>Paragraph</th>
            <td><?php echo nl2br(htmlspecialchars($article['paragraph'])); ?></td>
        </tr>
        <tr>
            <th>Upvotes</th>
            <td><?php echo htmlspecialchars($article['upvotes']); ?></td>
        </tr>
    </table>

    <h2>Upvote this article</h2>
    <form method="post" onsubmit="return checkLogin('upvote')">
        <input type="hidden" name="upvote" value="1">
        <button type="submit">Upvote</button>
    </form>

    <h2>Ask a Question</h2>
    <form method="post" onsubmit="return checkLogin('ask a question')">
        <label for="question">Your Question:</label><br>
        <textarea name="question" id="question" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="ask_question" value="1">
        <button type="submit">Submit Question</button>
    </form>
</body>
</html>
