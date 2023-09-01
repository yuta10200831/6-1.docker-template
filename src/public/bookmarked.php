<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=contactform; charset=utf8',
  $dbUserName,
  $dbPassword
);

$stmt = $pdo->query("SELECT * FROM contacts WHERE bookmarked = 1");
$bookmarked_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ブックマークした投稿</title>
</head>
<body>
<p>ようこそ、<?php echo $_SESSION["username"]; ?>さん！</p>
<h2>ブックマークした投稿</h2>
<?php if (empty($bookmarked_entries)): ?>
    <p>ブックマークした投稿はありません。</p>
<?php else: ?>
    <ul>
      <?php foreach($bookmarked_entries as $entry): ?>
        <li>
          <strong>タイトル:</strong> <?php echo $entry['title']; ?><br>
          <strong>Email:</strong> <?php echo $entry['email']; ?><br>
          <strong>お問い合わせ内容:</strong> <?php echo $entry['content']; ?><br>
        </li>
      <?php endforeach; ?>
    </ul>
<?php endif; ?>
<a href="history.php">戻る</a>
<a href="export_csv.php">CSVで出力</a>
</body>
</html>
