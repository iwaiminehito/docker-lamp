<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Location:http://localhost:8080/kadai/0526kadai-gridsystem/0526kadaigrid.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>接続テスト</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container container-background">
        <div class="form-group ">
            <form class="container form-background " action="" method="POST">
                <p class="fw-bold fs-2">コメント入力：</p>
                <input type="text" name="contents" class="form-control" placeholder="コメントを入力してください" size="80" maxlength="40"><br>
                <input type="submit" value="投稿する" class="input-submit btn btn-primary col-md-2 col-md-offset-5">
            </form>
        </div>

        <?php
            $dsn = 'mysql:host=mysql;dbname=test;charset=utf8';
            
            // データベースのユーザー名
            $user = 'test';
            
            // データベースのパスワード
            $password = 'test';
            
            // tryにPDOの処理を記述
            if (isset ($_POST["contents"]) ) {
            try {
            
            // PDOインスタンスを生成
            $dbh = new PDO($dsn, $user, $password);
            echo "接続できました";

            // INSERT文を変数に格納
            $sql = "INSERT INTO posts (contents) VALUES (:contents)";
            
            // 挿入する値は空のまま、SQL実行の準備をする
            $stmt = $dbh->prepare($sql);
            
            // 挿入する値を配列に格納する
            $params = array(':contents' => $_POST["contents"]);

            // 挿入する値が入った変数をexecuteにセットしてSQLを実行
            $stmt->execute($params);

            // 登録完了のメッセージ
            echo '登録完了しました';
            // エラー（例外）が発生した時の処理を記述
            } catch (PDOException $e) {
            
            // エラーメッセージを表示させる
            echo 'データベースにアクセスできません！' . $e->getMessage();
            
            // 強制終了
            exit;
            
            }
            } else {
            // echo "接続できません";
            }
        ?>
    <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <?php
                    $dbh = new PDO($dsn, $user, $password);
                    $sql_select = "SELECT * FROM posts";
                    $res = $dbh->query ($sql_select);

                    foreach ($res as $value) {
                    $date = date('Y年m月d日 H時i分s秒',  strtotime($value['create_times']));
                    echo "$value[id] 　|　" ;
                    echo "<span class=\"create_times\">$date</span> <br>";
                    echo "<p>$value[contents]</p>";
                    echo "<hr>";
                    }
                ?>
            </div>
            <div class="col-md-2">
            </div>
    </div>
</div>
</body>
</html>

<!-- ツイッター風のコメント投稿機能
・pdo使用／htmlからpostでinsert文で追加／select文で表示
・グリッドシステムでレスポンシブ
・できれば投稿が上から新しい順に, SELECTに何かを追加
・削除／編集ボタン作成-->
