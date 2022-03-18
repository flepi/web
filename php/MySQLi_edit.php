<?php 
$conn = new mysqli("localhost", "root", "" , "bd_st11");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>Изменить</title>
</head>

<body>
    <?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM kitties WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userage = $row["age"];
                $userbreed = $row["breed"];
            }
            echo "<h3>Изменение котов</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Возраст:
                    <input type='number' name='age' value='$userage' /></p>
                    <p>Порода:
                    <input type='text' name='breed' value='$userbreed' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"])&& isset($_POST["breed"])) {
      
    $userid = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["name"]);
    $userage = $conn->real_escape_string($_POST["age"]);
    $userbreed = $conn->real_escape_string($_POST["breed"]);
    $sql = "UPDATE kitties SET name = '$username', age = '$userage', breed = '$userbreed' WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        header("Location: MySQLi.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
</body>
</html>
