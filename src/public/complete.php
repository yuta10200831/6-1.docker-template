<?php

<?php
session_start(); // セッションを開始

// ログインしていないとフォーム送信を行わない
if (!isset($_SESSION["username"])) {
    echo "ログインしてください。";
    echo '<a href="index.php">戻る</a>';
    exit; 
}

$title = $_POST["title"];
$email = $_POST["email"];
$content = $_POST["content"];

$errors = [];
if (empty($title) || empty($email) || empty($content)){
  $errors[] = '「タイトル」 「Email」 「お問い合わせ内容」のどれかが記入されておりません！';
}

  $dbUserName = 'root';
  $dbPassword = 'password';
  $pdo = new PDO(
    'mysql:host=mysql; dbname=contactform; charset=utf8',
    $dbUserName,
    $dbPassword
  );

  $stmt = $pdo->prepare("INSERT INTO contacts (
    title, email, content, bookmarked
  ) VALUES (
    :title, :email, :content, 0
  )");
  
  $stmt->bindParam( ':title', $title, PDO::PARAM_STR);
  $stmt->bindParam( ':email', $email, PDO::PARAM_STR);
  $stmt->bindParam( ':content', $content, PDO::PARAM_STR);
  $res = $stmt->execute();
  
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>お問い合わせ内容</title>
</head>

<body>
  <div>
    <?php if(!empty($errors)): ?>
      <?php foreach($errors as $error): ?>
        <p><?php echo $error . "<br>"; ?></p>
      <?php endforeach; ?>
      <a href="index.php">送信画面へ</a>
    <?php endif; ?>

    <?php if(empty($errors)): ?>
      <h2>送信完了！！！！！！</h2>
      <a href="index.php">送信画面へ</a><br><br>
      <a href="history.php">送信履歴へ</a>
    <?php endif; ?>
  </div>
</body>
    
</html>