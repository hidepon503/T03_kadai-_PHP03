<!-- 画像のアップロードがうまくできない。。。 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アンケート</title>
</head>
<body>
  <section class="anke">
    <h1>利用者アンケート</h1>
    <div class="anke_wrapper">
      <table>
        <form action="result2.php" method="POST" enctype="multipart/form-data">
          <tr>
            <th><label for="name">お名前</label></th>
            <td id="">
              <input id="name" type="text" name="name" size="40" required length="100" pattern="[\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}a-zA-Z]+">
            </td>
          </tr>
          <tr>
            <th><label for="ageSelect">年齢</label></th>
            <td id="">
              <select name="age" id="ageSelect" >
                <option value="未選択" disabled selected>選択してください</option>
                <!-- JSで1〜100歳まで作る -->
              </select>
            </td>
          </tr>
          <tr>
            <th><label for="gander">性別</label></th>
            <td id="gander">
              <input type="radio" id="male" name="gander" value="男">
              <label for="male">男</label>
              <input type="radio" id="female" name="gander" value="女">
              <label for="female">女</label>
            </td>
          </tr>
          <tr>
            <th>ご意見</th>
            <td>
              <textarea name="opinion" id="opinion" cols="35" rows="10"></textarea>
            </td>
          </tr>
          <!-- 写真のデータを送信 -->
          <tr>
            <th>写真</th>
            <td>
              <input type="file" name="file" id="image">
            </td>
          <tr>
            <th>
              <input type="submit" value="送信">
            </th>
          </tr>
        </form>
          
      </table>
      <?php
      
      ?>



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>
        // セレクトボックスに1〜100歳までの数字を入れるJS
        $(document).ready(function(){
          for(let i = 1; i <= 100; i++){
            $('#ageSelect').append($('<option>',{
              value: i,
              text: i + '歳'
            }));
            }
          }
        );
      </script>
    </div>


  </section>
</body>
</html>