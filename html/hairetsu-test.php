<?php
echo 'Please enter: ';
$stdin = trim(fgets(STDIN));

echo "正の整数値：$stdin" . "\n";
$result = 1;
for ($i = 1; $i <= $stdin; $i++) {
$result = $result * $i;
// $result2 = $result1 * $i;
// $result3 = $result2 * $i;
// $result4 = $result3 * $i;
// $result5 = $result4 * $i;
}
// echo $result1;
echo "1から5までの積は" . $result . "です。";





?>