<?php

session_start();  // セッションをスタート

// ログインしていない場合、ログインページにリダイレクト
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

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
<!-- ログイン状態を確認する -->
<?php if (!isset($_SESSION["username"])): ?>
  <!-- 未ログインの場合、ログインボタンを表示 -->
  <a href="login.php" class="bg-indigo-500 text-white py-2 px-6 rounded hover:bg-indigo-600">ログイン</a>
<?php else: ?>
  <!-- ログイン済みの場合、ユーザー名とログアウトボタンを表示 -->
  <p>ようこそ、<?php echo $_SESSION["username"]; ?>さん！</p>
  <a href="logout.php">ログアウト</a>
<?php endif; ?>

<!-- トップページの記述 -->
  <h2>投稿履歴</h2>
  <?php if (empty($history)): ?>
    <p>送信履歴なし</p>
  <?php else: ?>
    <ul>
      <?php foreach($history as $entry): ?>
        <li>
          <strong>タイトル:</strong> <?php echo $entry['title']; ?><br>
          <strong>Email:</strong> <?php echo $entry['email']; ?><br>
          <!-- ブックマークボタン -->
          <strong>お問い合わせ内容:</strong> <?php echo $entry['content']; ?><br>
          <a href="bookmark_toggle.php?id=<?php echo $entry['id']; ?>">
          <?php echo (isset($entry['bookmarked']) && $entry['bookmarked'] == 1) ? '♥' : '➕'; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <a href="index.php">戻る</a>
</body>
</html>

