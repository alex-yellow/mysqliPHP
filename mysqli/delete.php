<?php
if(isset($_POST["id"]))
{
    $conn = mysqli_connect("localhost", "root", "root", "testdb3");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM Users WHERE id = '$userid'";
    if(mysqli_query($conn, $sql)){
        echo '<script>location.href="index.php";</script>';
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>