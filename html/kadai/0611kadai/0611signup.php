<?php
session_start();

// 管理ページのログインパスワード
define( 'PASSWORD', 'adminPassword');

// データベースの接続情報
$dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
$user = "test";
$password = "test";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>
<body>

<h1>ログイン画面</h1>
<?php if( !empty($error_message) ): ?>
    <ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
            <li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif;   ?>

<section>

<!-- <?php if( !empty($_SESSION['admin_login']) && $_SESSION['admin_login'] === true ): //のちにはdb登録されたパスワードと照合させるようにする ?> -->

<?php if( !empty($message_array) ){ ?>
<?php foreach( $message_array as $value ){ ?>
<article>
    <div class="info">
      <h2><?php echo htmlspecialchars($value['view_name'], ENT_QUOTES, 'UTF-8'); ?></h2>
      <time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
    </div>
    <p><?php echo nl2br( htmlspecialchars( $value['message'], ENT_QUOTES, 'UTF-8') ); ?></p>
</article>
<?php } ?>
<?php } ?>

<?php else: ?>
  <form name="loginForm" action="" method="POST">
    <fieldset>
      <legend>ログインフォーム</legend>
        ユーザー名：<input type="text" name="username" placeholder="ユーザー名を入力" value="">
        <br>
        メールアドレス：<input type="email" name="email" placeholder="メールアドレスを入力" value="" >
        <br>
      <input type="submit" name="btn_submit" value="ログイン">
    </fieldset>
  </form>
  <a href="0611register-01.php">新規登録はこちらから</a>
<?php endif; ?>
</section>
</body>
</html>

<?php 
//DB内でPOSTされたメールアドレスを検索
try {
  $pdo = new PDO ($dsn, $user, $password);

  $username = $_POST['username'];

  $sql = "SELECT * FROM users WHERE username LIKE (:username)";

  $stmt = $pdo->prepare($sql);

  $stmt -> execute([$_POST['username']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  var_dump($row);




} catch (PDOException $e) {
  $errorMessage = 'データベースエラー';
  $e->getMessage(); 
  echo $e->getMessage();
}

//usernameがDB内に存在しているか確認
if (!isset ($row['username'])) {
  var_dump($row);
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;
}

//パスワード確認後sessionにメールアドレスを渡す
if (password_verify($_POST['username'], $row['username'])) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['USERNAME'] = $row['username'];
  echo 'ログインしました';
} else {
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;
}
?>
