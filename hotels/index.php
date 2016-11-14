<?php
require_once ('../app.php');
$hotels = $dataConnect->getHotelAll();
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">トップページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

<h3 class="text-middle">新着ホテル</h3>
<?php
foreach ($hotels as $hotel) {
    echo '<div class="media">';
    echo '<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">';
    echo sprintf('<a href="/hotels/show.php/%s">', $hotel['id']);
    echo '<img class="media-object" src="';
    echo $hotel['image_url'];
    echo '" alt="hotel_picture" style="width: 100%; height: auto">';
    echo '</a>';
    echo '</div>';
    echo '<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">';
    echo '<h4 class="media-heading">';
    echo sprintf('<a href="/hotels/show.php/%s">', $hotel['id']);
    echo $hotel['hotel_name'];
    echo '</a>';
    echo '</h4>';
    echo $hotel['detail'];
    echo '</br>';
    echo sprintf('<a href="/reviews/new.php/hotelId=%s">このホテルのレビューを書く</a>', $hotel['id']);
    echo sprintf('<a href="/hotels/show.php/%s">このホテルのレビュー・詳細を見る</a>', $hotel['id']);
    echo '</div>';
    echo '</div>';
}
?>

            </div>
        </div>
    </div>
</div>