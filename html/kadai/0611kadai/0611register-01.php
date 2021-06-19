<?php
session_start();

$dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
$user = "test";
$password = "test";

$errorMessage = "";
$signUpMessage = "";

// submitが押されたら
if (isset($_POST["signUp"])) {

    if (empty($_POST["username"])) { 
        $errorMessage = 'ユーザー名が未入力です';
    } else if (empty($_POST["email"])) {
        $errorMessage = 'メールアドレスが未入力です';
    } 

    if (!empty($_POST["username"]) && !empty($_POST["email"])) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $email = $_POST["email"];
        $dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
        // 2. ユーザIDとパスワードが入力されていたら認証する
        // $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        
        try {
            $pdo = new PDO($dsn, "$user", "$password");
            $sql = "INSERT INTO users(username, email) VALUES (:username, :email)";
            $stmt = $pdo->prepare($sql);

            $params = array(':username' => $username, ':email' => $email);
            $stmt->execute($params);

            $signUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。メールアドレスは '. $email. ' です。';  // ログイン時に使用するIDとパスワード
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            $e->getMessage(); 
            echo $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
                <div><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></div>
                ユーザー名：<input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="">
                <br>
                メールアドレス：<input type="email" id="email" name="email" value="" placeholder="メールアドレスを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録">
            </fieldset>
        </form>
        <br>
        <form action="0611signup.php">
            <input type="submit" value="戻る">
        </form>
    </body>
</html>