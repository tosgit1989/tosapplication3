<?php
require_once ('../app.php');
$review['rate'] = $_POST['rate'];
$review['review'] = $_POST['review'];
$review['hotel_id'] = $HotelId;
$review['created_at'] = $now = date('Y/m/d H:i:s');
$review['updated_at'] = $now = date('Y/m/d H:i:s');
$dataConnect->insert($review);
header('Location: /hotels/index.php');
?>


