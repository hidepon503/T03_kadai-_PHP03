<?php
// 元のファイルの拡張子を取得
$file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

// タイムスタンプとランダムな文字列を組み合わせてファイル名を作成
// uniqid関数は一意なIDを生成し、rand関数は乱数を生成する
$img_name = uniqid(rand(),true) . '.' . $file_ext;

// 画像をアップロード
move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $img_name);
// 画像の保存先のパスを$imageに格納。プロジェクトファイルから見た階層のパスになる。create.phpからの階層ではないので注意。

// ＄imageに、画像の保存先のパスを格納することでsrc=""で呼び出せるようにしている。
$image = 'upload/' . $img_name;
// echo $image;
// exit();


// POSTできたリクエスト内容の入力チェック(受信確認処理追加)。エラー表示は。
if(
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['gender']) || $_POST['gender'] == '' ||
  !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
  !isset($_POST['opinion']) || $_POST['opinion'] == '' 
  ){
  exit('ParamError');
}

// POSTデータ取得
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$opinion = $_POST['opinion'];
// $image = isset($_POST['image']) ? $_POST['image'] : '';


// DB接続
try{
  $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$sql="INSERT INTO users(id, name, gender, birthday, opinion, image, indate)VALUES(NULL, :name, :gender, :birthday, :opinion, :image, sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_INT);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':opinion', $opinion, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR); 

// SQL実行
$status = $stmt->execute();

// データ登録処理後
if($status == false){
  $error = $stmt->errorInfo();
  exit('QueryError:'.$error[2]);
}else{  
  header('Location: index.php');
  exit;
}
?>

