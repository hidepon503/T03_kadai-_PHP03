<?php
$name = $_GET['name'];
$age = $_GET['age'];

function h($str){
  return htmlspecialchars($str, ENT_QUOTES);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>
    お名前：<?= h($name);?>
  </p>
  <p>
    年齢：<?= $age?>
  </p>

</body>
</html>