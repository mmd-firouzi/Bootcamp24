<?php
// Check if logged in
 
    if(isset($_COOKIE['username'])) {
        header("Location: home.php");
        exit();
    }

    // Check form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'user' && $password === 'password') {
            // Set cookie for 2 days
            setcookie('username', $username, time() + (2 * 24 * 60 * 60));

            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid username or password";
    }
}
?>