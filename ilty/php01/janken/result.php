<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>


<?php
$n = rand(1,3);
function cpu($n){
  if($n == 1){
    return "グー";
  }else if($n == 2){
    return "チョキ";
  }else{
    return "パー";
  }
}
$cpu = cpu($n);

$hand = $_POST["hand"] ?? "";

function janken($cpu, $hand) {
  if ($cpu == $hand) {
    return "あいこ";
  } else if ($cpu == 1 && $hand == 2) {
    return "あなたの勝ち";
  } else if ($cpu == 2 && $hand == 3) {
    return "あなたの勝ち";
  } else if ($cpu == 3 && $hand == 1) {
    return "あなたの勝ち";
  } else {
    return "あなたの負け";
  }
}

$result = janken($cpu, $hand);
?>
<body>
<h1>勝敗</h1>
<p>コンピュータ：<?= $cpu ?></p>
<p>あなた：<?= $hand ?></p>
<p>結果：<?= $result ?></p>
</body>
</html>
