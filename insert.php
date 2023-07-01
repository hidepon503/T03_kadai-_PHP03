  <h2>登録</h2>
  <table class="" style="border:solid 1px black">
    <form action="create.php" method="POST" enctype="multipart/form-data">
      <tr>
        <th><label for="name">名前</label></th>
        <td><input type="text" id="name" name="name"></td>
      </tr>
      <tr>
        <th><label for="gender">性別</label></th>
        <td id="gender">
          <input type="radio" id="men" name="gender" value="1"><label for="men">男</label>
          <input type="radio" id="female" name="gender" value="2"><label for="female">女</label>
        </td>
      </tr>
      <tr>
        <th><label for="birthday">生年月日</label></th>
        <td><input type="date" id="birthday" name="birthday"></td>
      </tr>
      <tr>
        <th><label for="opinion">コメント</label></th>
        <td><textArea name="opinion" id="opinion" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <th>写真</th>
        <td><input type="file" name="image" accept="image/*"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="登録"></td>
      </tr>
    </form>
  </table>