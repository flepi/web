<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>Добавить</title>
</head>
<body>
    <?php
if (isset($_POST["username"]) && isset($_POST["userage"])&& isset($_POST["userbreed"])) {
      
    $conn = new mysqli("localhost", "root", "" , "bd_st11");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["username"]);
    $age = $conn->real_escape_string($_POST["userage"]);
    $breed = $conn->real_escape_string($_POST["userbreed"]);
    $sql = "INSERT INTO kitties (name, age, breed) VALUES ('$name', $age, '$breed')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
    header("Location: MySQLi.php");
}
?>
    <h3>Добавление пользователя</h3>
<form method="post">
    <p>Имя:
    <input type="text" name="username" /></p>
    <p>Возраст:
    <input type="number" name="userage" /></p>
    <p>Порода:
    <input type="text" name="userbreed" /></p>
    <input type="submit" value="Добавить!">
</form>
</body>
</html>
