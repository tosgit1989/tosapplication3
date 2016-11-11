<?php
require_once ('../src/Services/DataHandler.php');
require_once ('../src/Services/Methods.php');
$data_connect = new \Services\DataHandler();
$hotels = $data_connect->all();
?>
<html>
<body>
トップページ
<?php
foreach ($hotels as $hotel) {
    echo $hotel['hotel_name'];
    echo $hotel['image_url'];
    echo $hotel['detail'];
    echo $hotel['access'];
    echo $hotel['address'];
    echo $hotel['fee1'];
    echo $hotel['fee2'];
    echo $hotel['created_at'];
    echo $hotel['updated_at'];
}
?>
</body>
</html>


