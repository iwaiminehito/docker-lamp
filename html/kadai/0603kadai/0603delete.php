<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除の確認ページ</title>
  </head>
  <body>
  <!-- 削除する投稿のidをpostで送る -->
  <form method="GET">
  <input type="submit" value="削除する" name="posts_id">
  </form>
  <a href="0603kadai.php">キャンセル</a><br>
  <p>
      <a href="0603kadai.php">投稿一覧へ</a>
  </p> 
  </body>
</html>
<?php
  var_dump($_GET['delete_id']);
try {
  $user = "test";
  $password = "test";
  $dbh = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "$user", "$password");

  $sql_delete = "DELETE FROM posts WHERE id = :id";
  $stmt = $dbh->prepare($sql_delete);

  $stmt->execute(array(':id' => $_GET['delete_id']));
  var_dump($_GET['delete_id']);


  echo "削除しました。";

} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}


	// try {

	// 	// SQL作成
	// 	$stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");

	// 	// 値をセット
	// 	$stmt->bindValue( ':id', $_POST['message_id'], PDO::PARAM_INT);

	// 	// SQLクエリの実行
	// 	$stmt->execute();

	// 	// コミット
	// 	$res = $pdo->commit();

	// } catch(Exception $e) {

	// 	// エラーが発生した時はロールバック
	// 	$pdo->rollBack();
	// }

	// // 削除に成功したら一覧に戻る
	// if( $res ) {
	// 	header("Location: ./admin.php");
	// 	exit;
	// }

?>