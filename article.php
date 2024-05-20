<?php include 'fetch_articles.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
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
                    <li><a href="article.html">Articles</a></li>
                    <li><a href="article_detail.html">Article - Details</a></li>
                    <li><a href="tracks.html">Tracks</a></li>
                    <li><a href="program.html">Program</a></li>
                </ul>
                <button id="loginBtn">Log In</button>
            </nav>
        </div>
    </header>
    
    <!-- The Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form id="loginForm">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Log In</button>
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
                                <p>Author: <?php echo htmlspecialchars($article['author_name']); ?></p>
                                <?php if (!empty($article['pdf_link'])): ?>
                                    <p><a href="<?php echo htmlspecialchars($article['pdf_link']); ?>">PDF</a></p>
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