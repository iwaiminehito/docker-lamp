<?php

$blog = $_POST;

foreach($blog as $key=>$value) {
  echo '<p>';
  echo $key . '：' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  echo '</p>';

}

?>