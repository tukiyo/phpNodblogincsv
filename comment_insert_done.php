<?php
session_start();
if (! $_SESSION['id']) {
	header('Location: login.php');
	exit;
}

// 読み込み
$handle = fopen("csv/text.csv", "r");
$line_number = 0;
$data = "";
while ($line = fgets($handle)) {
	$line_number++;
	$data .= $line;
}
// 投稿
$line = $_SESSION['id'];
$line.= "," . $_POST["comment"];
$line.= "," . date('Y-m-d H:m:s');
$line.= PHP_EOL;
$data .= $line;
fclose($handle);

// 書き込み
$handle = fopen("csv/text.csv", "w");
fwrite($handle, $data);
fclose($handle);

?>
<meta http-equiv="refresh" content="1;URL=top.php">
コメントを投稿しました。
