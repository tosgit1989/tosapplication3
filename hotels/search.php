<?php
require_once ('../app.php');
?>
<html>
<body>
ホテルを検索
<form method="POST" action="/hotels/exec.php">
    <div class="form-group">
        <input class="form-control" placeholder="都道府県を入力" name="prefecture" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="ホテル名を入力" name="hotel" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="詳細情報を入力" name="detail" type="text">
    </div>
    <button type="submit">検索</button>
</form>
</body>
</html>