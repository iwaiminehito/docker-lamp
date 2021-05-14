<?php
$datas = file_get_contents("./list.csv");
$datas_ex = explode("\n", $datas);

foreach ($datas_ex as $data) {
  $line[] = explode(",", $data);
}
// var_dump($line);
//この時点でIDや名前で分割された配列になっている
?>
<style>
  table {
    border-collapse: collapse;
    text-align: center;
    border: solid 1px;
  }
  th {
    background-color: #cdefff;
    border: solid 1px;
  }
  td {
    border: solid 1px;
  }
</style>

<table>
  <tr>
    <th>ID</th><th>名前</th><th>フリガナ</th><th>電話番号</th><th>メールアドレス</th><th>パスワード</th><th>登録日時</th><th>アカウントフラグ</th>
  </tr>
  <?php for ($i = 1; $i <=count($line); $i++) {?>
  <tr>
    <td><?php echo $line[$i][0] ?></td>
    <td><?php echo $line[$i][1] ?></td>
    <td><?php echo $line[$i][2] ?></td>
    <td><?php echo $line[$i][3] ?></td>
    <td><?php echo $line[$i][4] ?></td>
    <td><?php echo $line[$i][5] ?></td>
    <td><?php echo $line[$i][6] ?></td>
    <td><?php echo $line[$i][7] ?></td>
  </tr>
  <?php } ?>
</table>
