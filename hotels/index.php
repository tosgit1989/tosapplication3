<?php
require_once ('../app.php');
$hotels = $dataConnect->getHotelAll();
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">トップページ</p>
</div>

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
    echo '<a href="/hotels/show.php/h=';
    echo $hotel['id'];
    echo '_r=0_u=0">レビュー・詳細を見る</a>';
}
?>