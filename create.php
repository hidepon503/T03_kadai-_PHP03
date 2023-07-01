<?php
// 画像ファイルを同じ階層のフォルダuploadに保存し、パス名を＄imageに代入する
// $image = file_get_contents($_FILES['image']['tmp_name']);
// $image_type = $_FILES['image']['type'];
echo '<pre>';
var_dump($_FILES);
echo '</pre>';
exit();

if (!empty($_FILES['image']['name'])) {
    // ファイル名の生成
    $imageName = date('YmdHis') . $_FILES['image']['name'];
  // var_dump($imageName);
    // 画像をアップロード
    move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $imageName);
  // var_dump($_FILES['image']['tmp_name']);
    // 画像のパスを格納
    $image = 'upload/' . $imageName;
    // var_dump($image);
    // exit();
} else {
    // 画像がアップロードされなかった場合
    $image = null;
}
// var_dump($image);
// var_dump($_FILES['image']['name']);
// exit();



// POSTできたリクエスト内容の入力チェック(受信確認処理追加)。エラー表示は。
if(
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['gender']) || $_POST['gender'] == '' ||
  !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
  !isset($_POST['opinion']) || $_POST['opinion'] == '' 
  // ||
  // !isset($_POST['image']) || $_POST['image'] == ''
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

