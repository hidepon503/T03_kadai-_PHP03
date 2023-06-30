<style>
    .janken {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }
</style>

<section class="janken">
  <form action="result.php" method="POST">
    <input type="radio" name="hand" value="グー" id="gu"><label for="gu">グー</label>
    <input type="radio" name="hand" value="チョキ" id="choki"><label for="choki">チョキ</label>
    <input type="radio" name="hand" value="パー" id="pa"><label for="pa">パー</label>
    <input type="submit" value="勝負">
  </form>
</section>