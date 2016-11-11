<?php
require_once ('../app.php');
$HotelId = $methods->getHotelId($_SERVER['REQUEST_URI']);
$ReviewId = $methods->getReviewId($_SERVER['REQUEST_URI']);
?>
<html>
<body>
レビューの新規作成
<form method="POST" action="<?php echo sprintf('/reviews/save.php/%s', $ReviewId) ?>">
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