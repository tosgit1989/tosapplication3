<?php
require_once ('../app.php');
$user = $dataConnect->findUser($UserId);
?>
ユーザー情報の編集
<form method="POST" action="/users/exec.php/h=0_r=0_u=<?php echo $UserId ?>">
    <div class="form-group">
        <input required="required" class="form-control" placeholder="メールアドレスを入力" name="email" type="text">
    </div>
    <div class="form-group">
        <input required="required" class="form-control" placeholder="ニックネームを入力" name="nickname" type="text">
    </div>
    <button type="submit">更新する</button>
</form>
