<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jan-ken01</title>
</head>
<body>
  <h1>じゃんけん</h1>
  <p>出す手を選んで勝負してください。</p>
  <form action="0417jan-ken02.php" method="post">
    <label for="janken">
      <p><input type="radio" name="janken" value="グー">グー</p>
    </label>
    <label for="janken">
      <p><input type="radio" name="janken" value="チョキ">チョキ</p>
    </label>
    <label for="janken">
      <p><input type="radio" name="janken" value="パー">パー</p>
    </label>
    <p>
      <input type="submit" value="勝負する！">
    </p>
  </form>
  
</body>
</html>

