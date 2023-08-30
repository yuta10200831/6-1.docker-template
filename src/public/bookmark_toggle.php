<?php
// DB接続...
$id = $_GET['id'];

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
  'mysql:host=mysql; dbname=contactform; charset=utf8',
  $dbUserName,
  $dbPassword
);

// 現在のブックマークステータスを取得
$stmt = $pdo->prepare("SELECT bookmarked FROM contacts WHERE id = ?");
$stmt->execute([$id]);
$currentStatus = $stmt->fetchColumn();

// ステータスをトグル
$newStatus = ($currentStatus == 1) ? 0 : 1;
$stmt = $pdo->prepare("UPDATE contacts SET bookmarked = ? WHERE id = ?");
$stmt->execute([$newStatus, $id]);

// history.phpにリダイレクト
header('Location: history.php');
exit;
?>
