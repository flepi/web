<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
</head>

<body>
            <form  class="ui-form" method="POST">
                <h2>Регистрация</h2>
            <div class="form-row">
                <input type="text" name="username"  placeholder="Username" require>
            </div>
            <div class="form-row">
                <input type="email" name="email"  placeholder="Email" require>
            </div>
            <div class="form-row">
                <input type="password" name="password"  placeholder="Password" require>
            </div>
                <input type="submit" value="Зарегистрироваться">
                <a href="login.php">Авторизоваться</a>
            </form>
<?php
try
{
    if (isset($_POST["username"]) && isset($_POST["email"])&& isset($_POST["password"])) 
    {
          
        $conn = new mysqli("localhost", "root", "" , "bd_st11");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $username = $conn->real_escape_string($_POST["username"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $sql = "INSERT INTO `users` (username, email, `password`) VALUES ('$username', '$email', '$password')";
        if($conn->query($sql))
        {
            echo "Регистрация прошла успешна";  
        }
         else
        {
            echo "Ошибка: введите корректные данные";
        }
    }
}
catch(PDOException $e)
{
    echo "Database error: " . $e->getMessage();
}
        //header("Location: MySQLi.php");
        //require('connect.php');
?>
</body>

</html>