<?php
require_once ('../app.php');
$review = $dataConnect->findReview($ReviewId);
?>
<html>
<body>
レビューの編集
<form method="POST" action="/reviews/exec.php/h=<?php echo $HotelId ?>_r=<?php echo $ReviewId ?>_u=<?php echo $UserId ?>">
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レートを入力" name="rate" type="text" value="<?php $review['rate'] ?>">
    </div>
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レビューを入力" name="review" type="text" value="<?php $review['review'] ?>">
    </div>
    <button type="submit">更新する</button>
</form>
</body>
</html>