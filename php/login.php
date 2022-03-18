<?php
$conn = new mysqli("localhost", "root", "" , "bd_st11");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
</head>
<body>   
    <form  class="ui-form" method="POST">
                <h2>Авторизоваться</h2>
            <div class="form-row">
                <input type="text" name="username"  placeholder="Логин" require>
            </div>
            <div class="form-row">
                <input type="password" name="password"  placeholder="Пароль" require>
            </div>
                <input type="submit" name="auth" value="Войти">
                <a href="register.php">Зарегистрироваться</a>
    </form>
    <?php
    session_start();
            // Сравниваем пароли
            if(isset($_POST['auth']))
            {
                $username= $_POST['username'];
                $password= $_POST['password'];

                $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password= '$password'");
                if(mysqli_num_rows($sql) == 1)
                {
                    header("Location: MySQLi.php");
                }
            }
            else
            {
                print "Вы ввели неправильный логин/пароль";
            }
    
    ?>

</body>
</html>