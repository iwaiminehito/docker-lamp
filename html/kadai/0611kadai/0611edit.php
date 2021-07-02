<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集するためのページ</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
  <body>
  <h1>編集するためのページ</h1>
      <form action="./0611top.php" method="POST">
        <textarea name="contents-edits"><?php echo $_GET["edit_contents"]?></textarea>
        <input type="submit" name="contents-btn" value="更新する">
      </form>


    <?php

    if (!empty ($_POST["contents-btn"]) ) {
      try {
        $user = "test";
        $password = "test";
        $dbh = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "$user", "$password");

        $sql_edit = "UPDATE posts SET contents = :contents WHERE id = :id";
        $stmt = $dbh->prepare($sql_edit);
        $stmt->bindParam(':id', $_GET['edit_id'], PDO::PARAM_STR);
        $stmt->bindParam(':contents', $_POST['contents-edits'], PDO::PARAM_STR);
        $stmt->execute();
        // var_dump($sql_edit);
        echo "更新しました。";

      } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
      }
    }
    
    ?>
    <p>
      <a href="0603kadai.php">投稿一覧へ</a>
    </p> 
  </body>
</html>
<!-- 
覚え書き
・formのactionの中身の0603kadai.phpを消去したら編集更新できた
-->