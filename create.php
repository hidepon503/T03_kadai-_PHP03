  <h1>お気に入り登録</h1>
  <table class="" style="border:solid 1px black">
    <form action="create.php" method="POST" enctype="multipart/form-data">
      <tr>
        <th><label for="name">名前</label></th>
        <td><input type="text" id="name" name="title"></td>
      </tr>
      <tr>
        <th><label for="gender">性別</label></th>
        <td id="gender">
          <input type="radio" id="men" name="gender" value="男"><label for="men">男</label>
          <input type="radio" id="female" name="gender" value="女"><label for="female">女</label>
        </td>
      </tr>
      <tr>
        <th><label for="birthday">生年月日</label></th>
        <td><input type="datetime" id="birthday" name="birthday"></td>
      </tr>
      <tr>
        <th><label for="comment">コメント</label></th>
        <td><textArea name="comment" id="comment" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <th>写真</th>
        <td><input type="file" name="image"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="登録"></td>
      </tr>
    </form>
  </table>