<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新規登録</title>
</head>
<body>
    <h2>新規登録</h2>
    <form action="register_process.php" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password"><br>
        <a href="index.php">新規登録！</a>
    </form>
    <a href="login.php">ログイン</a>
    <a href="index.php">送信画面へ</a>
</body>
</html>
