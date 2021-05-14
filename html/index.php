
<form action="index.php" method="GET">
    名前：<input type="text" name="name" value=""><br>
    パスワード：<input type="text" name="password" value=""><br>
    <input type="submit" name="submit" value="送信">
</form>


<?php 
$db = file_get_contents("./database.csv");
$db_ex = [];
$db_ex = explode("\n", $db);

foreach ( $db_ex as $key => $values ) {
    $value = explode(",", $values);
    if( $_GET["name"] || $_GET["password"]) {
            if ( $value[1] == $_GET["name"] ) {
                $flag1 = 1;
            }
            if ($value[3] == $_GET["password"]) {
                $flag2 = 1;
            }
            if ($flag1 = 1 && $flag2 = 1) {
                break;
            }
        }
}
if ($flag1 = 1 && $flag2 = 1) {
    echo $_GET["name"] . "さんがログインしました";
} else {
    echo $_GET["name"] . "さんがログインできませんでした";
}
?>

