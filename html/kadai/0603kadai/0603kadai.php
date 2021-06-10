<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST' || 'GET') {
//   header('Location:http://localhost:8080/kadai/0603kadai/0603kadai.php');
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>接続テスト</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="container container-background">
    <form class="container form-background" action="" method="POST">
      <div class="form-group">
        <div class="row">
          <div class="col-1"></div>
          <textarea name="contents" class="form-control form-control-lg col-10" placeholder="コメントを入力してください" ></textarea>
          <div class="col-1"></div>
        </div>
        <div class="row">
          <div class="col-4"></div>
          <input type="submit" value="投稿する" class="input-submit btn btn-primary col-4">
          <div class="col-4"></div>
        </div>
      </div>
    </form>

    <?php
    try {
      $dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
      $user = "test";
      $password = "test";

      $dbh = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "$user", "$password");

    } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      } 
    //コメントを投稿するためのコード
    if (!empty ($_POST["contents"]) ) {
      try {
        // コメント投稿するためのコード
        $sql = "INSERT INTO posts (contents) VALUES (:contents)";
        $stmt = $dbh->prepare($sql);
        $params = array(':contents' => $_POST["contents"]);
        $stmt->execute($params);

        // $stmt = $dbh->query('SELECT * FROM posts');
        // $result = 0;
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
      } 
    } else {
      echo "コメントを入力してください";
    }

    // コメント一覧を表示するためのコード



      // コメント表示するためのコード
      $sql_select = "SELECT * FROM posts ORDER BY create_times DESC";
      $res = $dbh->query ($sql_select);

      foreach ($res as $value) {
        $date = date('Y年m月d日 H時i分s秒',  strtotime($value['create_times']));
        echo ("$value[id] 　|　");
        echo "<span class=\"create_times\">$date</span> <br>";
        echo "<p>$value[contents]</p>";
        echo "<form action=\"0603delete.php\" method=\"GET\">";
        echo "<input type=\"hidden\" name=\"delete_id\" value=\"" . $value["id"] . "\">";
        echo "<input type=\"submit\" value=\"削除\">";
        echo "</form>";
        echo "<form action=\"0603edit.php\" method=\"GET\">";
        echo "<input type=\"hidden\" name=\"edit_id\" value=\"" . $value["id"] . "\">";
        echo "<input type=\"hidden\" name=\"edit_contents\" value=\"" . $value["contents"] . "\">";
        echo "<input type=\"submit\" value=\"編集\">";
        echo "</form>";
        echo "<hr>";
      }


      ?>
  </div>
</body>

<!-- ツイッター風のコメント投稿機能
・pdo使用／htmlからpostでinsert文で追加／select文で表示
・グリッドシステムでレスポンシブ
・できれば投稿が上から新しい順に, SELECTに何かを追加
・削除／編集ボタン作成

・submitは単にボタン生成。別にinputタグ作ってvalue属性に受け渡したい値を入れる

-->

