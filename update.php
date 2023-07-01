<?php



// POSTできたリクエスト内容の入力チェック(受信確認処理追加)。エラー表示は。
// var_dump($_POST);
if(
  !isset($_POST['id']) || $_POST['id'] == '' ||
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['gender']) || $_POST['gender'] == '' ||
  !isset($_POST['birthday']) || $_POST['birthday'] == '' ||
  !isset($_POST['opinion']) || $_POST['opinion'] == '' 
  // ||
//   // !isset($_POST['image']) || $_POST['image'] == ''
){
  exit('ParamError');
}

// POSTデータ取得
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$opinion = $_POST['opinion'];


// 画像ファイルがアップロードされたのか確認
if(!empty($_FILES['image']['name'])){
  // 元のファイルの拡張子を取得
  $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  // タイムスタンプとランダムな文字列を組み合わせてファイル名を作成
  // uniqid関数は一意なIDを生成し、rand関数は乱数を生成する
  $img_name = uniqid(rand(),true) . '.' . $file_ext;

  // 画像をアップロード
  move_uploaded_file($_FILES['image']['tmp_name'], 'kadai01/up/' . $img_name);

  // 新しい画像のパスを$imageに格納
  $image = 'kadai01/up/' . $img_name;
}else{
  // 画像がアップロードされなかった場合は、元の画像のパスを$imageに格納
  // $image = $_POST['image'];

  // 画像がアップロードされなかった場合は、$imageは空文字とする
    $image = '';

}


// DB接続
try {
  $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

// 更新前の画像ファイルのパスを取得
$stmt = $pdo->prepare("SELECT image FROM users WHERE id=:id;");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
if($status==false){
  $error = $stmt->errorInfo();
  exit('QueryError:'.$error[2]);
}else{
  $old_image_path = $stmt->fetchColumn();
}


// 更新SQL作成
if($image != ''){
  // 画像がアップロードされた場合は、imageフィールドも更新
  $stmt = $pdo->prepare("UPDATE users SET name=:name, gender=:gender, birthday=:birthday, opinion=:opinion,image=:image, indate=sysdate() WHERE id=:id;");
  $stmt->bindValue(':image', $image, PDO::PARAM_STR);
}else{
  // 画像がアップロードされなかった場合は、imageフィールドは更新しない
  $stmt = $pdo->prepare("UPDATE users SET name=:name, gender=:gender, birthday=:birthday, opinion=:opinion, indate=sysdate() WHERE id=:id;");
}
// $stmt = $pdo->prepare("UPDATE users SET name=:name, gender=:gender, birthday=:birthday, opinion=:opinion, indate=sysdate() WHERE id=:id;");
// // バインド変数を設定
// // var_dump($stmt);
// // exit();
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_INT);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':opinion', $opinion, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// SQL実行
$status = $stmt->execute();


// ここでエラーチェックとリダイレクトを追加
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
  if($image != ''){
    // 新しい画像がアップロードされた場合は、古い画像を削除
    if(file_exists($old_image_path)){
      unlink($old_image_path);
    }
  }
    header('Location: index.php');
    exit;
}

?>
