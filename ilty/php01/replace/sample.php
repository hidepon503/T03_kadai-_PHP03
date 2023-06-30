<?php
$str_base = "PHP_PHP2_PHP3_PHP4_PHP5";
$str = str_replace("H", "O", $str_base);
echo $str_base.'<br>';
echo $str.'<br>';
$str_hairetu = explode("_", $str);
var_dump($str_hairetu);
?>