
<?php
if(isset($_COOKIE['username'])) {
        header("Location: home.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h1>Login Page</h1>
        <div class="content">
            <form class = "content__form" method="post" action="login.php">  
            <div class="content__inputs">
                <label for="">
                    <input type="text" id="username" name="username" required="" placeholder="plz type user here as username">
                </label>
              <label>
                <input type="password" id="password" name="password" required="" placeholder="plz type password here as password">
              </label>
            </div>
            <input class = "button1" type="submit" value="Login">
          </form>
        </div>
    </div>
</body>
</html>