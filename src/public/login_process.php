<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO(
        'mysql:host=mysql; dbname=contactform; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["username"] = $user["username"];
        header("Location: index.php");
    } else {
        echo "ログインに失敗しました。";
    }
}
?>
