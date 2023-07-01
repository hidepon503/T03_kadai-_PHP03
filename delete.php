<?php 
$id = $_GET['id'];

// DB接続
try {
  $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

// 削除sql文作成
$stmt = $pdo->prepare("DELETE FROM users WHERE id=:id;");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 削除処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit('QueryError:'.$error[2]);
}else{
  header('Location: index.php');
  exit;
}

?>