<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
if(isset($_GET["id"]))
{
    $conn = mysqli_connect("localhost", "root", "root", "testdb3");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "SELECT * FROM Users WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $username = $row["name"];
                $userage = $row["age"];
                echo "<div>
                        <h3>Информация о пользователе</h3>
                        <p>Имя: $username</p>
                        <p>Возраст: $userage</p>
                    </div>";
            }
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
</body>
</html>