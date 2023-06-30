<?php
$name = $_POST["name"];
$age = $_POST["age"];
$num = rand(1,5);
function result($num){
  if($num ==1){
    return '大吉';
  }else if($num == 2){
    return '中吉';
  }else if($num ==3){
    return '小吉';
  }else if($num ==4){
    return '凶';
  }else{
    return "大凶";
  }

}
$result = result($num);

// if($num ==1){
//   echo $num.':大吉';
// }else if($num == 2){
//   echo $num.':中吉';
// }else{
//   echo $num.":大凶";
// }


function h($str){
  return htmlspecialchars($str, ENT_QUOTES);
}

// $array = array("PHP1", "PHP2", "PHP3");
// var_dump($array);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>omikuji result</title>
</head>
<body>
  <h1>結果：<?= $result ?></h1>
  <p>お名前：<?= h($name) ?></p>
  <p>年齢：<?= h($age) ?></p>
</body>
</html>