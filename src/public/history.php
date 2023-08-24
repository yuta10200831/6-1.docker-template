<?php
// DBへ接続
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=contactform; charset=utf8',
  $dbUserName,
  $dbPassword
);

// $historyへDBのデータを格納
$stmt = $pdo->query("SELECT * FROM contacts");
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿履歴</title>
</head>
<body>
  <h2>投稿履歴</h2>
  <?php if (empty($history)): ?>
    <p>送信履歴なし</p>
  <?php else: ?>
    <ul>
      <?php foreach($history as $entry): ?>
        <li>
          <strong>タイトル:</strong> <?php echo $entry['title']; ?><br>
          <strong>Email:</strong> <?php echo $entry['email']; ?><br>
          <strong>お問い合わせ内容:</strong> <?php echo $entry['content']; ?><br>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <a href="index.php">戻る</a>
</body>
</html>

