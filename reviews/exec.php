<?php
require_once ('../app.php');
$review['rate'] = $_POST['rate'];
$review['review'] = $_POST['review'];
$review['hotel_id'] = $HotelId;
$review['user_id'] = $UserId;
$review['updated_at'] = $now = date('Y/m/d H:i:s');
if ($ReviewId == 'new') {
    $review['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insertReview($review);
    header('Location: /hotels/index.php');
} elseif ($HotelId == 'broken') {
    $dataConnect->deleteReview(['id'=>$ReviewId]);
    header('Location: /hotels/index.php');
} else {
    $dataConnect->updateReview($review, ['id'=>$ReviewId]);
    header('Location: /hotels/index.php');
}

?>


