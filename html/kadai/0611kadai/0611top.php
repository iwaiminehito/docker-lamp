<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップ画面</title>
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
      $dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
      $user = "test";
      $password = "test";

    //コメントを投稿するためのコード
    if (!empty ($_POST["contents"]) ) {
      $clean = htmlspecialchars($_POST['contents'], ENT_QUOTES, 'UTF-8');

      try {
        // コメント投稿するためのコード
        $dbh = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "$user", "$password");
        
        $sql = "INSERT INTO users (contents) VALUES (:contents)";
        
        $stmt = $dbh->prepare($sql);

        $params = array(':contents' => $_POST["contents"]);

        $stmt->execute($params);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

      } catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
      } 
    } else {
      echo "コメントを入力してください";
    }

    // コメント一覧を表示するためのコード
      $sql_select = "SELECT * FROM users";
      $res = $dbh->query ($sql_select);

      foreach ($res as $value) {
        $date = date('Y年m月d日 H時i分s秒',  strtotime($value['create_times']));
        echo ("$value[id] 　|　");
        echo "<span class=\"create_times\">$date</span> <br>";
        echo "<p>$value[contents]</p>";
        echo "<form action=\"0611delete.php\" method=\"GET\">";
        echo "<input type=\"hidden\" name=\"delete_id\" value=\"" . $value["id"] . "\">";
        echo "<input type=\"submit\" value=\"削除\">";
        echo "</form>";
        echo "<form action=\"0611edit.php\" method=\"GET\">";
        echo "<input type=\"hidden\" name=\"edit_id\" value=\"" . $value["id"] . "\">";
        echo "<input type=\"hidden\" name=\"edit_contents\" value=\"" . $value["contents"] . "\">";
        echo "<input type=\"submit\" value=\"編集\">";
        echo "</form>";
        echo "<hr>";
      }


      ?>
  </div>
</body>



<!-- 
  ・投稿するためのフォームを表示
  ・投稿を編集、削除するためのフォームを表示
  ・投稿一覧を表示
 -->