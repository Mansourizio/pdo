<!DOCTYPE html>
<html lang="en">
<?php
$db_host = 'localhost';
$db_name = 'loginpdo';
$db_user = 'root';
$db_password = '';
try {
    $pdo = new PDO("mysql:dbhost=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("database connection failed  " . $e->getMessage());
}

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
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="passwords" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $passwords = $_POST['passwords'];

    $stmt = $pdo->prepare("SELECT * FROM information where email=? ");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($passwords, $user["passwords"])) {
        $message = "login success";
        echo ("<script>alert('$message')</script>");
    } else {
        echo "<p style='color:red;'>Invalid username or passwords!</p>";
    }
}
?>

</html>