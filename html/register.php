<!-- お名前とパスワードをcsvに追加する -->
<form action="" method="POST">
    お名前：<input type="text" name="name" value="" required><br>
    パスワード：<input type="text" name="password" value="" required><br>
    <input type="submit" value="送信">
</form>

<?php 
if ($_POST !== null) {
    $fp = fopen("./database02.csv", "a");
    foreach ($_POST as $value) {
        fwrite($fp, $value . ",");
    }

fwrite($fp, "\n");
fclose($fp);
}
?>