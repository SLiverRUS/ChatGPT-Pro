<?php
$previousPage = $_SERVER['HTTP_REFERER'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatgpt";

// Создаем соединение
$db = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Имя и пароль найдены в базе данных
    echo "Имя и пароль найдены";
    // Закрываем соединение
    $db->close();
    header("Location: profile.html");
    exit();
} else {
    // Имя и пароль не найдены в базе данных
    // Подготавливаем SQL-запрос с использованием подготовленного выражения
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    // Выполняем запрос
    if ($db->query($sql) === true) {
        echo "Данные успешно вставлены";
    } else {
        echo "Ошибка при вставке данных: " . $db->error;
    }
}

// Закрываем соединение
$db->close();
header("Location: $previousPage");
exit();
?>