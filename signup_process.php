<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Sign Up</h2>
    <form action="signup_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
<?php
$db_host = 'localhost';
$db_name = 'loginpdo';
$db_user = 'root';
$db_password = ''; 
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"],PASSWORD_BCRYPT);
    try{
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="INSERT INTO information(name,lastname,email,passwords) VALUES(:username,:lastname,:email,:password)";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password',$password);
        
        $stmt->execute();
        echo "execution seccessful!";

    }catch(PDOException $e){
        echo "error", $e->getMessage();
    }

}
?>
</html>