<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>接続テスト</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<form action="" method="POST">
    ID入力：<input type="text" name="ID" value=""><br>
    コメント入力：<input type="text" name="contents" value=""><br>
    <input type="submit" value="送信">
</form>

<?php
$db = mysqli_connect("mysql", "test", "test", "test") or die("接続に失敗しました");
echo "接続に成功しました";
mysqli_set_charset( $db, 'utf8');

// $sql = 'INSERT INTO (id, contents)
// VALUES ($_POST["ID"], $_POST["contents"])';
// var_dump ($sql);

// PDOでINSERT文を使ってMySQLにデータを挿入
// INSERT文を変数に格納
$sql = "INSERT INTO posts (id, contents, create_times) VALUES (:id, :contents, now())";
var_dump($sql);
// 挿入する値は空のまま、SQL実行の準備をする
$stmt = $dbh->prepare($sql);
 
// 挿入する値を配列に格納する
$params = array(':id' => '55', ':contents' => 'tameshi-tameshi');
 var_dump($params);
// 挿入する値が入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);
 
// 登録完了のメッセージ
echo '登録完了しました';




mysqli_query($db, $sql);
mysqli_close($db);

?>

</body>
</html>

<!-- ツイッター風のコメント投稿機能　投稿・編集・削除できる・pdo使用・htmlからpostでinsert文で追加・select文で表示　定期的にgitにアップ 　できればグリッドスタイルでレスポンシブ contents/create_time-->
