<?php
//$_post['username']の値が受け取れないので、試しに作成
// データベース情報を記載
//トライキャッチ
//プレスホルダーによってポストの値を取得
// ポストの値が空でなければログインできる


$dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
$user = "test";
$password = "test";

try {
  $pdo = new pdo ($dsn, $user, $password);
  echo "1111" . "<br>";
  $sql = "SELECT * FROM user where username = :username";

  $stmt = $pdo->prepare ($sql);

  $stmt->bindValue(":username", $_POST["username"], PDO::PARAM_STR);

  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  var_dump($row['username']);
  
} catch (PDOException $e) {
  $errorMessage = 'データベースエラー';
  $e->getMessage(); 
  echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>0624signup.php</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="username">
    <input type="submit" >
  </form>
  <!-- <?php echo $_POST["username"]; ?> -->
</body>
</html>