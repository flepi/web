<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>MySQLi</title>
</head>
<body>
    <h2>Список пользователей</h2>
    <form action="MySQLi_add.php">
        <input type="submit" value="Добавить!">
    </form> 
<?php
$conn = new mysqli("localhost", "root", "" , "bd_st11");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM kitties";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Возраст</th><th>Порода</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["breed"] . "</td>";
            echo "<td><a href='MySQLi_filtr.php?id=" . $row["id"] . "'>Подробнее</a></td>";
            echo "<td><a href='MySQLi_edit.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><form action='MySQLi_del.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
<a href="logout.php">Выйти</a>
</body>
</html>
