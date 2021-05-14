<?php
define("message.txt", "./message.txt");
date_default_timezone_set("Asia/Tokyo");

$now_date = null;
$data = null;
$file_handle = null;
$split_data = null;
$message = array();
$message_array = array();
$secces_message = null;

if (!empty($_POST["btn_submit"])) {
  if($file_handle = fopen("message.txt", "a")) {
    $now_date = date("Y-m-d H:i:s");
    $data = "'".$_POST['view_name']."','".$_POST['message']."','".$now_date."'\n";
    fwrite($file_handle, $data);
    fclose($file_handle);
  }
}
if ($file_handle = fopen("message.txt", "r")) {
  while ($data = fgets($file_handle)) {
    $split_data = preg_split('/\'/', $data);

    $message = array(
      "view_name" => $split_data[1],
      "message" => $split_data[3],
      "post_date" => $split_data[5],
    );
    array_unshift($message_array, $message);
  }
  fclose($file_handle);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一言掲示板0413</title>
</head>
<body>
  <h1>一言掲示板</h1>
  <form action="" method="post">
    <div>  
      <label for="view_name">表示名</label>
      <input id="view_name" type="text" name="view_name" value="">
    </div>
    <div>
      <label for="message">一言メッセージ</label>
      <textarea id="message" name="message" rows="4" cols="100"></textarea></div>
      <input type="submit" name="btn_submit" value="書き込む">
    </div>
  </form>
  <hr>
  <section>
  <?php if(!empty($message_array)): ?>
  <?php foreach($message_array as $value): ?>
  <article>
    <div class="info">
      <h2><?php echo $value["view_name"]; ?></h2>
      <time><?php echo date('Y年m月d日 H:i', strtotime($value["post_date"])); ?></time>
    </div>
    <p><?php echo $value["message"]; ?></p>
  </article>
  <?php endforeach; ?>
  <?php endif; ?>
  </section>
</body>
</html>