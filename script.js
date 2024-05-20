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