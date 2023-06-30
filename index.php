<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お客様の声収集アプリ</title>
</head>
<body>



  <?php

// htmlspecialcharsでXSS対策
  function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
  


  include('header.php');
  include('insert.php');
  include('list.php');
  include('footer.php');
  ?>

</body>
</html>