<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connect</title>
</head>
<body>
<?php

$db = mysqli_connect("mysql", "test", "test", "test") or die("接続に失敗しました");
echo "接続に成功しました";

mysqli_set_charset( $db, 'utf8');

$sql = "INSERT INTO test (
	id, name, password, age
) VALUES (
	'5', 'takahashi','takataka','20'
)";
mysqli_query($db, $sql);
mysqli_close($db);

?>
</body>
</html>

