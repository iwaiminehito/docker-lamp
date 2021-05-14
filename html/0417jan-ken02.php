<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jan-ken02</title>
</head>
<body>

  
<?php
$guchokipa = ["グー", "チョキ", "パー"];

if (isset($_POST["janken"])) {
  $player = $_POST["janken"];
  $hand = array_rand($guchokipa);
  $computer = $guchokipa[$hand];

  if ($player == $computer) {
    $result = "あいこ！";
  } elseif ($player == "グー" && $computer == "チョキ") {
    $result = "勝ち！";
  } elseif ($player == "チョキ"  && $computer == "パー") {
    $result = "勝ち！";
  } elseif ($player == "パー" && $computer == "グー") {
    $result = "勝ち！";
  } else {
    $result = "負け！";
  }
}
?>
  <h1>結果は・・・</h1>
  <h2> <?php echo $result; ?></h2>
  あなた：<?php echo $player; ?><br>
  コンピューター：<?php echo $computer; ?><br>
  <a href="http://localhost:8080/0417jan-ken01.php"> >>もう一回勝負する</a>
</body>
</html>