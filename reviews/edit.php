<?php
require_once ('../app.php');
$review = $dataConnect->findReview($ReviewId);
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">レビューの編集</p>
</div>
<form method="POST" action="/reviews/exec.php/h=<?php echo $HotelId ?>_r=<?php echo $ReviewId ?>_u=<?php echo $UserId ?>">
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レートを入力" name="rate" type="text" value="<?php $review['rate'] ?>">
    </div>
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レビューを入力" name="review" type="text" value="<?php $review['review'] ?>">
    </div>
    <button type="submit">更新する</button>
</form>