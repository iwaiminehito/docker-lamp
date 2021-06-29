<?php
session_start();
// postであればリダイレクトする
// postの時はformの値が送信されている時
// getの時は送信されていない時なのでリダイレクトしない
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   header('Location:0611signup.php');
// }

// ログインできなかったらリダイレクトで新規登録画面に遷移させる
// if (!empty($_POST['btn_submit']) || !isset ($row['username'])) {
// header('Location: 0611register-01.php');
// }

// 条件分岐で
// flagが1つまりusernameが空であればエラーを出力
// flagが2つまりusernameあるけどdbと合致しなしなければ新規登録に遷移

if (empty ($_POST['username'])) {
  $flag = 1;
} elseif (!empty ($_POST['username']) || !isset ($row['username'])) {
  $flag = 2;
}

$dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
$user = "test";
$password = "test";

// 最初からエラーメッセージが出力されるのは、全てif文を通ってしまっているから

$error_message[] = "ユーザー名を入力してください";

// if (!empty($_POST['btn_submit']) || empty($_POST['username'])) {
//   $error_message[] = "ユーザー名を入力してください";
// }
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
<?php if( !empty($error_message) || !empty($_POST['btn_submit'])): ?>
    <ul>
		<?php foreach( $error_message as $value ): ?>
            <li><?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif;?>

<?php 
$limitMax = 16;
$limitMin = 6;
$namelength = mb_strlen($_POST['username']);
if ($namelength > 10 || $namelength < 5) {
 echo '6文字以上、16文字以下で入力して下さい';
}
?>

<section>
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
  <?php } else {?>
    <form name="loginForm" action="" method="POST">
      <fieldset>
        <legend>ログインフォーム</legend>
          ユーザー名：<input type="text" name="username" placeholder="ユーザー名を入力" value="">
          <br>
          <!-- メールアドレス：<input type="email" name="email" placeholder="メールアドレスを入力" value="" >
          <br> -->
        <input type="submit" name="btn_submit" value="ログイン">
      </fieldset>
    </form>
    <a href="0611register-01.php">新規登録はこちらから</a>
  <?php } ?>
</section>
</body>
</html>

<?php 
if( !empty($_POST['btn_submit']) ) {
  $clean = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
  // 入力されたスクリプトは実行されないがDBには、「<」が「&lt;」に変換されずに記号のまま登録されている。DB側でもサニタイズしなければならないはず。
  // そもそもサニタイズとエスケープ処理とは違うのか？＝＞エスケープはサニタイズの一種
  // preg_replace( '/\\r\\n|\\n|\\r/', '', $_POST['username']);

  try {
    $pdo = new PDO ($dsn, $user, $password);

    $sql = 'SELECT * FROM users WHERE username = :username';
    
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $clean, PDO::PARAM_STR);

    $stmt -> execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
    $errorMessage = 'データベースエラー';
    $e->getMessage(); 
    echo $e->getMessage();
  }

  // usernameがDB内に存在しているか確認
  if (!isset ($row['username'])) {
    echo 'メールアドレス又はパスワードが間違っています。';
    exit;
    //プログラム止める excit redirect
  } else {
    $flag = 1;
  }

  //パスワード確認後sessionにusernameを渡す
  if ($flag) {
    // session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['USERNAME'] = $row['username'];
    echo 'ログインしました';
  } else {
    echo 'メールアドレス又はパスワードが間違。';
    //セッションできなかったら、サインアップ画面を再表示させる
  }
}
?>

<!-- 
  ＄rowにフェッチで取得したデータを保持していればif文を通す
  issetは変数が宣言されていれば、またnullでなければtrueを返す
  is_nullは変数がnullかどうか調べる
  is_null ($value) 引数がnullならtrue、違うならfalseを返す
  
  0625より次のマター
  <script>alert("Hello");</script>対策
  バリデーション（DBとphp両方でバリデーションかける）：
  ・未入力
  ・文字数制限
  サニタイズ
  リダイレクトしてログイン成功メッセージ
 -->