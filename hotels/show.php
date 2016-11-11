<?php
require_once ('../app.php');
$dataConnect = new \Services\DataHandler();
$hotels = $dataConnect->getHotelAll();
$methods = new \Services\Methods();
$HotelId = $methods->getHotelId($_SERVER['REQUEST_URI']);
$hotel = $dataConnect->findHotel($HotelId);
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
echo sprintf('<a href="/reviews/new.php/HotelId=%s">このホテルのレビューを書く</a>', $hotel['id']);
?>
</body>
</html>