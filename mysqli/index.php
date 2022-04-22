<!DOCTYPE html>
<html>
<head>
<title>Справочник пользователей</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Список пользователей</h2>
<h2><a href="form.php">Создать пользователя</a></h2>
<?php
$conn = mysqli_connect("localhost", "root", "root", "testdb3");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Users";
if($result = mysqli_query($conn, $sql)){
    echo "<table><tr><th>Имя</th><th>Возраст</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td><a href='user.php?id=" . $row["id"] . "'>Подробнее</a></td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</body>
</html>