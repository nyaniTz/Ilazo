<?php
session_start();

// Set the session timeout duration in seconds (10 minutes in this case)
$timeout = 600;

// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    // Check if the last activity timestamp is set
    if (isset($_SESSION['last_activity'])) {
        // Calculate the elapsed time since the last activity
        $elapsed_time = time() - $_SESSION['last_activity'];

        // Check if the elapsed time exceeds the timeout duration
        if ($elapsed_time > $timeout) {
            // Destroy the session and redirect to the authentication page
            session_destroy();
            header("Location: Authentication.php");
            exit();
        }
    }

    // Update the last activity timestamp
    $_SESSION['last_activity'] = time();
}
?>

<script type="text/javascript">
    // Track user activity
    document.addEventListener("DOMContentLoaded", function () {
        var activityTimer;

        function resetTimer() {
            clearTimeout(activityTimer);
            activityTimer = setTimeout(logout, <?php echo $timeout * 1000; ?>);
        }

        function logout() {
            // AJAX request to logout and redirect to the authentication page
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Authentication.php?logout=true", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    location.href = "Authentication.php";
                }
            };
            xhr.send();
        }

        // Reset timer on user activity
        document.addEventListener("mousemove", resetTimer);
        document.addEventListener("keypress", resetTimer);
        document.addEventListener("scroll", resetTimer);
        document.addEventListener("touchstart", resetTimer);

        // Initialize timer on page load
        resetTimer();
    });
</script>

