<?php
require_once ('../app.php');
?>
<html>
<body>
レビューの新規作成
<form method="POST" action="<?php echo sprintf('/reviews/save.php/%s', $id) ?>">
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レートを入力" name="rate" type="text">
    </div>
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レビューを入力" name="review" type="text">
    </div>
    <button type="submit">投稿する</button>
</form>

</body>
</html>