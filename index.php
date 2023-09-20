<!DOCTYPE html>
<html lang="en">
<?php
$db_host = 'your_host';
$db_name = 'your_database';
$db_user = 'your_username';
$db_password = 'your_password';

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!--signe up-->
    <!-- <form action="">
    <label for="name">
     name
     <input type="text" name="name">
    </label>
</form> -->
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>