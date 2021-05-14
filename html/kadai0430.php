<?php
echo 'Please enter: ';
$stdin = trim(fgets(STDIN));

echo "左下直角の二等辺三角形を表示します。" . "\n";
echo "段数は：$stdin" . "\n";

//forを通った回数だけ＊を出力
for ($i = $stdin; $i > 0; $i--) {
  for ($x = 1; $x <= $i; $x++) {
    echo "*";
  }
  echo "\n";
}

$q = 10 % $stdin;
echo $q . "\n";