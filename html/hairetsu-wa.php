<?php
echo 'Please enter: ';
$stdin = trim(fgets(STDIN));

echo "1からnまでの和を求めます" . "\n";
echo "nの値：$stdin" . "\n";
$result = 1;
for ($i = 1; $i <= $stdin; $i++) {
  $result += $i;
}
echo "1からnまでの和は" . $result . "です。";




$stdin = trim(fgets(STDIN));

for (i=0; i<=$stdin; i++) {
  echo "-";
}