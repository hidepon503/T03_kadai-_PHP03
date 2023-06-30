<?php
// POSTできたリクエスト内容の入力チェック(受信確認処理追加)。エラー表示は。
if(
  !isset($_POST['id']) || $_POST['id'] == '' ||
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
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$opinion = $_POST['opinion'];
$image = isset($_POST['image']) ? $_POST['image'] : '';

// DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


// 更新SQL作成
$stmt = $pdo->prepare("UPDATE users SET name=:name, gender=:gender, birthday=:birthday, opinion=:opinion, image=:image WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_INT);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':opinion', $opinion, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR); 
$status = $stmt->execute();

// ここでエラーチェックとリダイレクトを追加
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header('Location: list.php');
    exit;
}

?>
