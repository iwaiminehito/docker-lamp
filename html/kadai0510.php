<?php
// $list = [11, 22, 33, 44, 55, 66];

// for ( $i = 0; $i <= count($list); $i++) {
//   echo $list[$i] . "\n";
// }

// $names = ['太郎', '次郎', '三郎', '四郎', '五郎'];
// for ($i = 0; $i <= count($names); $i++) {
//   echo $names[$i] . "\n";
// }

// for ($i = 10; $i >= 1; $i--) {
//   echo $i. "\n";
// }
// echo 'Please enter: ';
// $stdin = trim(fgets(STDIN));
// echo "年齢数えで" . $stdin . "さいは";

//   if ($stdin == 25 || $stdin == 42 || $stdin == 61) {
//     echo "男性の厄年です". "\n";
//   } else {
//     echo "男性の厄年ではありません" . "\n";
//   }
//   if ($stdin == 19 || $stdin == 33 || $stdin == 37) {
//     echo "女性の厄年です";
//   } else {
//     echo "女性の厄年ではありません";
//   }
// for文を使って、1～10のランダムな数字が入った配列を作成してください。
// 要素数(部屋の数)は3、重複しても可とする。

// $arr = array();

// for ($i = 0; $i < 3; $i++) {
//   $arr[$i] = rand(1, 10);
// } 
// var_dump ($arr);

// 以下のような異なる数字を持つ配列を作成。
// 60, 50, 90, 70, 80
// 配列の要素を降順(高い順)に表示してください。

// $arr = [60, 50, 90, 70, 80];
// asort($arr);
// foreach ($arr as $a) {
//   echo $a . "\n";
// }

// $arr = array();
// for ($i = 0; $i < 3; $i++) {
//   $rand[$i] = rand(1, 10);
// }
// var_dump ($rand);

// $a = array('aaa', 'bbb', 'ccc');
// for ($i = 0; $i < 3; $i++) {
//   var_dump ($a[$i]);
// }

// foreach ($a as $b) {
//   var_dump($b);
// }

// $arr = array(60, 50, 90, 70, 80);
// $max = 0;
// for ($i = 0; $i < count($arr); $i++) {
//   if ($arr[$i] > $max) {
//     $max = $arr[$i];
//   }
// }
// echo $max . "\n";


// $arr = array(60, 50, 90, 70, 80);
// $max = 0;
// for ($i = 0; $i < count($arr); $i++) {
//   if ($arr[$i] > $max) {
//     $max = $arr[$i];
//   }
// }
// echo $max . "\n";

// $rand = rand(1, 10);
// $max = 0;
// for ($i = 0; $i < 3; $i++) {
//   if ($rand[$i] > $max) {
//     $max = $rand[$i];
//   }
// }
// echo $max . "\n";


// $arr = array("ccc", "bbb", "aaa");

// $tmp = $arr[0];
// $arr[0] = $arr[2];
// $arr[2] = $tmp;

// var_dump($arr);

// $arr = array();
// for ($i = 0; $i < 3; $i++) {
//   $rand[$i] = rand(1, 10);
// }
// var_dump($rand);

// $arr = array("aaa", "bbb", "ccc");

// for ($i = 0; $i < count($arr); $i++) {
//   echo $arr[$i];
//   echo "<br>";
// }


// foreach ($arr as $a) {
//   echo $a . "<br>";
// }


// $arr = array("60", "50", "90", "70", "80");
// $max = 0;
// for ($i = 0; $i < count($arr); $i++) {
//   if ($arr[$i] > $max) {
//     $max = $arr[$i];
//   }
// }
// echo $max;

// $arr = array("60", "50", "90", "70", "80");
// rsort($arr);
// for ($i = 0; $i < count($arr); $i++) {
//   echo $arr[$i] . "<br>";
// }

$arr = array(60, 50, 90, 70, 80);
for ($i = 0; $i < count($arr)-1; $i++) {
  $maxIndex = $i;
  for ($j = $i+1; $i < count($arr); $j++) {
    if ($arr[$j] > $arr[$maxIndex]) {
      $maxIndex = $j;
    }
  }
  $tmp = $arr[$i];
  $arr[$i] =$arr[$maxIndex];
  $arr[$maxIndex] = $tmp;
}

foreach ($arr as $a) {
  echo $a . "<br>";
}