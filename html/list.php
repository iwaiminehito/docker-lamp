<!-- お名前とパスワードをcsvに追加する -->

<?php
$datas = file_get_contents("./database.csv");//文字列で出力される
$datas_ex = explode("\n", $datas);//改行区切りの配列で出力される
var_dump($datas_ex);

    foreach($datas_ex as $data_ex) {
        // for ($i = 0; $i <= 3; $i++) {
        var_dump($data_ex);
        $data[] = explode(",", $data_ex);
    // }
}
// var_dump($data);
var_dump($data[0][0])
?>
<table border="1">
<tr>
    <th>name</th>
    <th>password</th>
</tr>
<?php for ($i = 0; $i <=3; $i++) {?>
<tr>
    <td><?php echo $data[$i][0] ?></td>
    <td><?php echo $data[$i][1] ?></td>
</tr>
<?php } ?>
</table>
