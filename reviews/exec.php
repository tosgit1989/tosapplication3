<?php
require_once ('../app.php');
$review['rate'] = $_POST['rate'];
$review['review'] = $_POST['review'];
$review['hotel_id'] = $HotelId;
$review['updated_at'] = $now = date('Y/m/d H:i:s');
if ($ReviewId == 'new') {
    $review['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insert($review);
    header('Location: /hotels/index.php');
} elseif ($HotelId == 'broken' and $UserId == 'broken') {
    $dataConnect->delete(['id'=>$ReviewId]);
    header('Location: /hotels/index.php');
} else {
    $dataConnect->update($review, ['id'=>$ReviewId]);
    header('Location: /hotels/index.php');
}

?>


