<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>Подробнее</title>
</head>

<body>
    
    <?php
if(isset($_GET["id"]))
{
    $conn = new mysqli("localhost", "root", "" , "bd_st11");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM kitties WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userage = $row["age"];
                $userbreed = $row["breed"];
                echo "<div>
                        <h3>Информация о пользователе</h3>
                        <p>Имя: $username</p>
                        <p>Возраст: $userage</p>
                        <p>Порода: $userbreed</p>
                    </div>";
            }
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
