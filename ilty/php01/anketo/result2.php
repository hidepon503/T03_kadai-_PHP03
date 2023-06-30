<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アンケート結果</title>
</head>

<?php
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
// var_dump($_FILES['file']);
if(is_uploaded_file($_FILES['file']['tmp_name'])){
  // uploadフォルダが存在するか確認。なければ作成する。書き込み権限を付与する
  if(!file_exists('upload')){
    mkdir('upload');
  }
  // 画像のパスを変数に格納
  // 
  $file = 'upload/'.basename($_FILES['file']['name']);
  var_dump($file);
  // 画像をuploadフォルダに移動
  try {

//ここにif文を入れてみる

      if(move_uploaded_file($_FILES['file']['tmp_name'], $file)){
        echo $file, 'のアップロードに成功しました';
        echo '<p><img alt="image" src="', $file,'"><p>';
      }else{
        echo 'アップロードに失敗しました';
        throw new Exception('File upload failed.');
      }
      } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
      }
}else{
  echo 'ファイルを選択してください';
}

?>

<body>
  <h1>アンケート結果</h1>
  <p>お名前：<?= h($_POST["name"]) ?></p>
  <p>年齢：<?= h($_POST['age']) ?></p>
  <p>性別：<?= h($_POST['gander']) ?></p>
  <p>ご意見：<?= h($_POST['opinion']) ?></p>
  
  <!-- ＄_POST['image']の写真を表示させる -->
  <?php if($file): ?>
  <img src="<?= ($file) ?>" alt="写真">
  <?php endif; ?>

</body>
</html>