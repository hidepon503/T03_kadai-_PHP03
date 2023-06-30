<?php
// rand関数を使って、1か2の数字をランダムに出力してください
$num = rand(1,5);

// 

if($num ==1){
  echo $num.'大吉';
}else if($num == 2){
  echo $num.'中吉';
}else if($num ==3){
  echo $num.'小吉';
}else if($num ==4){
  echo $num.'凶';
}else{
  echo $num.'大凶';
}

?>