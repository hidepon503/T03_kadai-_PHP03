<?php
$num = 1;
if($num > 10){
  echo '10より大きいです';
}else{
  echo '10以下です';
}

if($num >= 10){
  echo '$numは10以上です';
}else{
  echo'$numは10未満です';
}

if($num == 10){
  echo '$numは10です';
}else{
  echo '$numは10ではありません';
}


if($num !== 10){
  echo '$numは10と同じではありません';
}else{
  echo '$numは10と同じです';
}
?>