<?php
session_start();

if (empty ( $_SESSION['username'])) {
  echo "ログインしてください" . '<br>';
  echo '<a href="0611signup.php">ログインフォームへ</a>' . '<br>';
  echo '<a href="0611register-01.php">新規登録はこちらから</a>';
  exit();
} else {
  echo "ユーザー名：" . $_SESSION['username']  . "<br>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除の確認ページ</title>
  </head>
  <body>
    <p>以下の内容を削除しますか？</p>
    <?php 
    echo "ID：" . $_GET["delete_id"] . "<br/>"; 
    echo "コメント内容：" . $_GET["delete_contents"];
    ?>

  <!-- 削除する投稿のidをpostで送る -->
  <form method="GET">
    <input type="submit" value="削除する" name="posts_id">
  </form>

  <form method="GET" action="0611top.php">
    <input type="submit" value="キャンセル" name="">
  </form>

  <p>
      <a href="0611top.php">投稿一覧へ</a>
  </p> 
  </body>
</html>
<?php

try {
  $user = "test";
  $password = "test";
  $dbh = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "$user", "$password");

  $sql_delete = "DELETE FROM posts WHERE id = :id";
  $stmt = $dbh->prepare($sql_delete);

  $stmt->execute(array(':id' => $_GET['delete_id']));

} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}
?>