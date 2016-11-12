<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">レビューの投稿</p>
</div>
<form method="POST" action="/reviews/exec.php/h=<?php echo $HotelId ?>_r=new_u=<?php echo $UserId ?>">
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レートを入力" name="rate" type="text">
    </div>
    <div class="form-group">
        <input required="required" class="form-control" placeholder="レビューを入力" name="review" type="text">
    </div>
    <button type="submit">投稿する</button>
</form>