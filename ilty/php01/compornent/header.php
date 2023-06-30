<?php
$b = date("Y年m月d日");

$d = date("s");//秒だけ取得
$result ="";
if($d >= 10 && $d < 20){
  $result = '
  <p style="color:red;">10秒以上です</p>
  <img src="./img/0000.jpeg">
  ';
}else if($d < 10){
  $result = '
  <p style="color:blue;">10秒未満です</p>
  <img src="./img/194878749_1249780995440845_3864627405299034698_n.jpg">
  ';
}else if($d >= 20 && $d < 30){
  $result = '
  <p style="color:green;">20秒以上です</p>
  <img src="./img/92589836_949210608831220_253193291376361472_n.jpg">
  ';
}else if($d >= 30 && $d < 40){
  $result = '
  <p style="color:yellow;">30秒以上です</p>
  <img src="./img/0000.jpeg">
  ';
}else if($d >= 40 && $d < 50){
  $result = '
  <p style="color:orange;">40秒以上です</p>
  <img src="./img/194878749_1249780995440845_3864627405299034698_n.jpg">
  ';
}else{
  $result = '
  <p style="color:purple;">50秒以上です</p>
  <img src="./img/92589836_949210608831220_253193291376361472_n.jpg">
  ';
}
// 上記の関数をHTMLの中で使うためには、PHPの中で関数を定義しておく必要があります。
// 関数のコードを記述
 function second($d){
  if($d >= 10 && $d < 20){
    echo '
    <p style="color:red;">10秒以上です</p>
    <img src="./img/0000.jpeg">
    ';
  }else if($d < 10){
    echo '
    <p style="color:blue;">10秒未満です</p>
    <img src="./img/194878749_1249780995440845_3864627405299034698_n.jpg">
    ';
  }else if($d >= 20 && $d < 30){
    echo '
    <p style="color:green;">20秒以上です</p>
    <img src="./img/92589836_949210608831220_253193291376361472_n.jpg">
    ';
  }else if($d >= 30 && $d < 40){
    echo '
    <p style="color:yellow;">30秒以上です</p>
    <img src="./img/0000.jpeg">
    ';
  }else if($d >= 40 && $d < 50){
    echo '
    <p style="color:orange;">40秒以上です</p>
    <img src="./img/194878749_1249780995440845_3864627405299034698_n.jpg">
    ';
  }else{
    echo '
    <p style="color:purple;">50秒以上です</p>
    <img src="./img/92589836_949210608831220_253193291376361472_n.jpg">
    ';
  }
  return $result;
}



?>

<h1>ヘッダー</h1>
<?= $result ?>


