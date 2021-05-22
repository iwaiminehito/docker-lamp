<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Location:http://localhost:8080/kadai/posts.php');
}
?>
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
    コメント入力：<input type="text" name="contents" value=""><br>
    <input type="submit" value="送信">
</form>

<?php
$dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
 
  // データベースのユーザー名
$user = 'test';
 
  // データベースのパスワード
$password = 'test';
 
// tryにPDOの処理を記述
if (isset ($_POST["contents"]) ) {
try {
 
  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);
  echo "接続できました";

 // INSERT文を変数に格納
$sql = "INSERT INTO posts (contents) VALUES (:contents)";
var_dump($sql);
 
// 挿入する値は空のまま、SQL実行の準備をする
$stmt = $dbh->prepare($sql);
 
// 挿入する値を配列に格納する
$params = array(':contents' => $_POST["contents"]);

// 挿入する値が入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

// 登録完了のメッセージ
echo '登録完了しました';
// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {
 
  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();
 
  // 強制終了
  exit;
 
}
} else {
  echo "接続できません";
}
// $_POST = NULL;

// $sql_select = "SELECT * FROM posts";

// $res = $dbh->query ($sql_select);

// foreach ($res as $value) {
//   echo "$value[id]<br>";
//   echo "$value[contents]<br>";
//   echo "$value[create_times]<br>";
// };


?>

</body>
</html>

<!-- ツイッター風のコメント投稿機能　投稿・編集・削除できる・pdo使用・htmlからpostでinsert文で追加・select文で表示　定期的にgitにアップ 　できればグリッドスタイルでレスポンシブ contents/create_time-->
