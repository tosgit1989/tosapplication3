<?php
require_once ('../app.php');
$review['rate'] = $_POST['rate'];
$review['review'] = $_POST['review'];
$review['user_id'] = $UserId;
$review['updated_at'] = $now = date('Y/m/d H:i:s');

if ($ReviewId == 'new') {
    // レビュー新規作成時
    $review['hotel_id'] = $HotelId;
    $review['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insertReview($review);
    header('Location: /hotels/index.php');
} elseif (preg_match('"edit"', $ReviewId)) {
    // レビュー更新時
    $dataConnect->updateReview($review, ['id' => array_pop(explode('=', $ReviewId))]);
    header('Location: /hotels/index.php');
} elseif (preg_match('"delete"', $ReviewId)) {
    // レビュー削除時
    $dataConnect->deleteReview(['id' => array_pop(explode('=', $ReviewId))]);
    header('Location: /hotels/index.php');
}

?>


