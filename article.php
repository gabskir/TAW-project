<?php
session_start();
include 'fetch_articles.php';
$currentFileName = basename(__FILE__);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('loginModal');
            var btn = document.getElementById('loginBtn');
            var span = document.getElementsByClassName('close')[0];

            btn.onclick = function () {
                modal.style.display = 'block';
            }

            span.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</head>
<body>
<header>
    <div class="container">
        <h1>Conference Name</h1>
        <nav>
            <ul>
                <li><a href="index.php?case_id=1">Homepage</a></li>
                <li><a href="index.php?case_id=2">Location</a></li>
                <li><a href="index.php?case_id=3">Other Information</a></li>
                <li><a href="article.php">Articles</a></li>
                <li><a href="tracks.php">Tracks</a></li>
                <li><a href="program.html">Program</a></li>
            </ul>
            <?php if (isset($_SESSION['username'])): ?>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <?php else: ?>
                <button id="loginBtn">Log In</button>
            <?php endif; ?>
        </nav>
    </div>
</header>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Login</h2>
        <form id="loginForm" method="post" action="login.php">
            <input type="hidden" name="file" value="<?php echo htmlspecialchars($currentFileName); ?>">
            <input type="hidden" name="action" value="login">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Log In</button>
        </form>
    </div>
</div>

<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Register</h2>
        <form id="registerForm" method="post" action="login.php">
            <input type="hidden" name="file" value="<?php echo htmlspecialchars($currentFileName); ?>">
            <input type="hidden" name="action" value="register">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Register</button>
        </form>
    </div>
</div>

<main>
    <div class="container">
        <section class="content">
            <div class="content-template">
                <h2>Articles</h2>
                <div class="article-list">
                    <?php foreach ($articles as $article): ?>
                        <div class="article">
                            <h3>
                                <a href="article_detail.php?article_id=<?php echo htmlspecialchars($article['id']); ?>">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </a>
                            </h3>
                            <p>Author: <?php echo htmlspecialchars($article['authors']); ?></p>
                            <?php if (!empty($article['pdf_link'])): ?>
                                <p><a href="<?php echo htmlspecialchars($article['pdf_link']); ?>" target="_blank">PDF</a></p>
                            <?php else: ?>
                                <p><a href="#">PDF not available</a></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="search">
                    <input type="text" placeholder="Search articles...">
                    <button>Search</button>
                </div>
            </div>
        </section>
    </div>
</main>
<footer>
    <div class="container">
        <p>&copy; 2024 Conference Name</p>
    </div>
</footer>
</body>
</html>
