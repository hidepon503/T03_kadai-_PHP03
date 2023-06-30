<style>
  table, th, td{
    border: solid 1px black;
  }
</style>

<?php
// 入力チェック(受信確認処理追加)
if(
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['gander']) || $_POST['gander'] == '' ||
  !isset($_POST['age']) || $_POST['age'] == '' ||
  !isset($_POST['opinion']) || $_POST['opinion'] == '' ||
  !isset($_POST['image']) || $_POST['image'] == ''
){
  exit('ParamError');
}

// POSTデータ取得
$name = $_POST['name'];
$gander = $_POST['gander'];
$age = $_POST['age'];
$opinion = $_POST['opinion'];
$image = $_POST['image'];

// DB接続
try{
  $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$sql="INSERT INTO cats_table(id, name, gander, age, opinion, image, indate)VALUES(NULL, :a1, :a2, :a3, :a4, :a5, sysdate())";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $gander, PDO::PARAM_STR);
$stmt->bindValue(':a3', $age, PDO::PARAM_INT);
$stmt->bindValue(':a4', $opinion, PDO::PARAM_STR);
$stmt->bindValue(':a5', $image, PDO::PARAM_STR);

// SQL実行
$status = $stmt->execute();



?>


<section class="favorite_container">
  <h2>お気に入り一覧</h2>
  <div class="favorite_list">
    <table style="width:80%;">
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>性別</th>
        <th>生年月日</th>
        <th>コメント</th>
        <th>写真のパス</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      <?php foreach($results as $result): ?>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['name']; ?></td>
        <td><?php echo $result['gander']; ?></td>
        <td><?php echo $result['age']; ?></td>
        <td><?php echo $result['opinion']; ?></td>
        <td><?php echo $result['image']; ?></td>
        <td>
          <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <input type="submit" value="更新">
          </form>
        
        </td>
        <td>
          <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <input type="submit" value="削除">
          </form>
        </td>

      
      <?php endforeach; ?>
    </table>
  </div>


</section>