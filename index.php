<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="script.js"></script>
</head>
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

<body>
    <?php include 'fetch_content.php'; ?>
    <main>
        <div class="container">
            <section class="content">
                <div class="content-template">
                    <h2><?php echo htmlspecialchars($mainContentTitle); ?></h2>
                    <article>
                        <h3><?php echo htmlspecialchars($articleTitle); ?></h3>
                        <p><?php echo htmlspecialchars($articleParagraph1); ?></p>
                        <p><?php echo htmlspecialchars($articleParagraph2); ?></p>
                    </article>
                    <aside>
                        <h3><?php echo htmlspecialchars($asideTitle); ?></h3>
                        <p><?php echo htmlspecialchars($asideContent); ?></p>
                    </aside>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Conference Name</p>
        </div>
    </footer>

    <script>
        // Variable to track login state
        var isLoggedIn = false;
    
        // Get the modal
        var modal = document.getElementById("loginModal");
    
        // Get the button that opens the modal
        var btn = document.getElementById("loginBtn");
    
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
    
        // When the user clicks the button, open the modal or log out
        btn.onclick = function() {
            if (isLoggedIn) {
                // Log out
                isLoggedIn = false;
                btn.textContent = "Log In";
                alert("You have logged out.");
            } else {
                // Show the login modal
                modal.style.display = "block";
            }
        }
    
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    
        // Handle the form submission
        document.getElementById('loginForm').onsubmit = function(event) {
            event.preventDefault();
            alert('Logging in with username: ' + document.getElementById('username').value);
            isLoggedIn = true;
            btn.textContent = "Log Out";
            modal.style.display = "none";
        }
    </script>
</body>
</html>