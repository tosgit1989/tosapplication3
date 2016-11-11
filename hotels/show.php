<?php
require_once ('../app.php');
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
echo sprintf('<a href="/reviews/new.php/h=%s_r=new_u=0">このホテルのレビューを書く</a>', $hotel['id']);
?>
</body>
</html>