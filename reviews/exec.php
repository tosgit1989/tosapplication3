<?php
require_once ('../app.php');
$review['rate'] = $_POST['rate'];
$review['review'] = $_POST['review'];
$review['user_id'] = $UserId;
$review['updated_at'] = $now = date('Y/m/d H:i:s');

if ($_POST['exectype'] == 'new') {
    // レビュー新規作成時
    $review['hotel_id'] = $HotelId;
    $review['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insertReview($review);
    header('Location: /index.php');
} elseif ($_POST['exectype'] == 'edit') {
    // レビュー更新時
    $dataConnect->updateReview($review, ['id' => $ReviewId]);
    header('Location: /users/show.php/<?php echo $UserId ?>');
} elseif ($_POST['exectype'] == 'delete') {
    // レビュー削除時
    $dataConnect->deleteReview(['id' => $ReviewId]);
    header('Location: /users/show.php/<?php echo $UserId ?>');
}

?>


