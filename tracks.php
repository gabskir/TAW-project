<?php

$currentFileName = basename(__FILE__);

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

// Fetch track data
$result = $conn->query("SELECT * FROM tracks");
$tracks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tracks[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Tracks</title>
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
                    <li><a href="article.php">Articles</a></li>
                    <li><a href="tracks.php">Tracks</a></li>
                    <li><a href="program.html">Program</a></li>
                </ul>
                <button id="loginBtn">Log In</button>
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
        <div class="container2">
            <section class="content">
                <div class="content-template2">
                    <h2>List of Tracks</h2>
                    <div class="track-list2">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tracks as $track): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($track['id']); ?></td>
                                    <td><?php echo htmlspecialchars($track['name']); ?></td>
                                    <td><?php echo htmlspecialchars($track['description']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
