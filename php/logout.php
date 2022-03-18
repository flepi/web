<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Выйти</title>
</head>
<body>
        <?php
        session_start();
        session_destroy(); //Для разрушения сессии 
        header('Location:register.php');
        exit
        ?>
</body>
</html>
