<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO(
        'mysql:host=mysql; dbname=contactform; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $res = $stmt->execute();

    if ($res) {
        header("Location: login.php");
    } else {
        echo "新規登録に失敗しました。";
    }
}
?>
