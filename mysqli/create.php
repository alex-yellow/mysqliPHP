<?php
if (isset($_POST["username"]) && isset($_POST["userage"])) {
      
    $conn = mysqli_connect("localhost", "root", "root", "testdb3");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $name = mysqli_real_escape_string($conn, $_POST["username"]);
    $age = mysqli_real_escape_string($conn, $_POST["userage"]);
    $sql = "INSERT INTO Users (name, age) VALUES ('$name', $age)";
        if(mysqli_query($conn, $sql)){
        echo "Данные успешно добавлены";
        echo '<script>location.href="index.php";</script>';
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>