<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>編集するためのページ</title>
  </head>
  <body>
    <form action="0603kadai.php" method="POST">
      <textarea name="contents-edits"><?php echo $_GET["edit_contents"]?></textarea>
      <input type="submit" name="contents-btn" value="更新する">
    </form>
    <p>
      <a href="0603kadai.php">投稿一覧へ</a>
    </p> 
  </body>
</html>
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
    //$stmt = $dbh->prepare($sql_edit);
    $stmt->execute();
    //$stmt->execute();
    var_dump($_GET['edit_id']);
    echo "更新しました。";

  } catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
  }
}

?>