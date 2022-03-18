<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="../css/style.css">
<title>Удалить</title>
</head>

<body>
    <?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "" , "bd_st11");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM kitties WHERE id = '$userid'";
    if($conn->query($sql)){
         
        header("Location: MySQLi.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>
</body>
</html>
