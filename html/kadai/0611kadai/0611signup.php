<?php
// 管理ページのログインパスワード
define( 'PASSWORD', 'adminPassword');

// データベースの接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', 'password');
define( 'DB_NAME', 'board');

?>

<h1>ログイン画面</h1>
<?php if( !empty($error_message) ): ?>
    <ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
            <li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>

<section>

<?php if( !empty($_SESSION['admin_login']) && $_SESSION['admin_login'] === true ): //のちにはdb登録されたパスワードと照合させるようにする
  ?>

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
  <form method="post">
    <div>
        <label for="admin_password">ログインパスワード</label>
        <input id="admin_password" type="text" name="admin_password" value="">
    </div>
    <input type="submit" name="btn_submit" value="ログイン">
  </form>
  <a href="0611register.php">新規登録はこちらから</a>
<?php endif; ?>
</section>
</body>
</html>
