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

$stmt = $pdo->query("SELECT * FROM contacts");
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

// CSV形式で情報を出力する準備
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="history.csv"');

$output = fopen('php://output', 'w');

// カラムヘッダーの設定
fputcsv($output, ['ID', 'タイトル', 'Email', 'お問い合わせ内容', 'ブックマーク']);

// データを1行ずつCSV出力
foreach ($history as $row) {
    fputcsv($output, $row);
}

fclose($output);
exit;
