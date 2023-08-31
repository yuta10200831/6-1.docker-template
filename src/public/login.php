<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>
    <form action="login_process.php" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">ログイン</button>
    </form>
    <a href="register.php">新規登録</a>
    <a href="index.php">送信画面へ</a>
</body>
</html>
