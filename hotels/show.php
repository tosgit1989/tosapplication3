<?php
require_once ('../app.php');
$data_connect = new \Services\DataHandler();
$hotels = $data_connect->all();
$methods = new \Services\Methods();
$hotel_id = $methods->get_hotel_id($_SERVER['REQUEST_URI']);
$hotel = $data_connect->hotel_find($hotel_id);
?>
<html>
<body>
<?php
echo $hotel['hotel_name'];
echo $hotel['image_url'];
echo $hotel['detail'];
echo $hotel['access'];
echo $hotel['address'];
echo $hotel['fee1'];
echo $hotel['fee2'];
echo $hotel['created_at'];
echo $hotel['updated_at'];
?>
</body>
</html>