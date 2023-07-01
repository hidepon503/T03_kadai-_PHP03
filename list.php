<style>
  table, th, td{
    border: solid 1px black;
  }
</style>
<?php
// DB接続
try {
  $pdo = new PDO('mysql:dbname=php02;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

// データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM users");
$status = $stmt->execute();

// データ表示
$results = [];
if($status==false){
  $error = $stmt->errorInfo();
  exit('QueryError:'.$error[2]);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $results[] = $result;
  }
}


?>
<section class="favorite_container">
  <h2>ご意見一覧</h2>
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
        <tr>
          <form action="update.php" method="POST" enctype="multipart/form-data">
            <td>
              <p><?= $result['id']; ?></p>
              <input type="hidden" name="id" value="<?= $result['id']; ?>">
            </td>
            <td>
              <input type="text" name="name" value="<?= $result['name']; ?>">
            </td>
            <td>
              <select name="gender" id="">
                <!-- if文を使うパターン -->
                <option value="1" <?php if($result['gender'] == 1) echo "selected";?>>男</option>
                <!-- 三項演算子の？：を使う方法 -->
                <option value="2" <?= $result['gender'] == 2 ? "selected" : ""; ?>>女</option>
              </select>
            </td>
            <td><input type="date" name="birthday" value="<?= $result['birthday']; ?>"></td>
            <td>
              <input type="text" name="opinion" value="<?= $result['opinion']; ?>">
            </td>
            <td>
              <img src="<?= $result['image']; ?>" style="width:auto; height:240px;" alt="">
              <input type="file" name="image" accept="image/*">
            </td>
            <td>
                <input type="submit" value="更新">
            </td>
          </form>
          <td>
            <form action="delete.php" method="GET">
              <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
              <input type="submit" value="削除">
            </form>
          </td>  
        </tr>
      
      <?php endforeach; ?>
    </table>
  </div>


</section>