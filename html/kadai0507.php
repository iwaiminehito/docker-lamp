<?php
echo 'Please enter: ';
$stdin = trim(fgets(STDIN));

for ($x = 0; $x <= $stdin; $x++) {
  $rand[$x] = mt_rand(1, 10);
}
var_dump($rand);
for ($i = 10; $i >= 1; $i--) {
  for ($j = 0; $j <= $stdin; $j++) {
    if($i <= $rand[$j]) {
      echo "* ";
    } else {
      echo "  ";
    }
  }echo "\n";
}
echo "\n";
for ($i=0; $i <= $stdin; $i++) {
  echo "--";
}
echo "\n";

for ($i=0; $i <= $stdin; $i++) {
  $joyo = $i % 10;
  echo $joyo." ";
}
