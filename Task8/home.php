<?php
// Check if not logged in
if(!isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit();
}

// Extend cookie 2 days
setcookie('username', $_COOKIE['username'], time() + (2 * 24 * 60 * 60));

// Logout 
if(isset($_POST['logout'])) {
    // Delete cookie
    setcookie('username', '', time() - 3600);

    // Redirect to first page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $_COOKIE['username']; ?></h2>
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>