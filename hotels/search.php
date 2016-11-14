<?php
require_once ('../app.php');
$hotels = $dataConnect->getHotelAll();
$KeywordArray = $methods->getEachKeyword($_SERVER['REQUEST_URI']);
$PrefectureKeyword =array_pop(explode('=', $KeywordArray[0]));
$HotelKeyword =array_pop(explode('=', $KeywordArray[1]));
$DetailKeyword =array_pop(explode('=', $KeywordArray[2]));
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">ホテルを検索</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3 class="text-middle">検索</h3>
<form method="POST" action="/hotels/exec.php/p=_h=_u=">
    <div class="form-group">
        <input class="form-control" placeholder="都道府県を入力" name="prefecture" type="text"><br>
        <input class="form-control" placeholder="ホテル名を入力" name="hotel" type="text"><br>
        <input class="form-control" placeholder="詳細情報を入力" name="detail" type="text"><br>
    </div>
    <button class="btn btn-primary" type="submit">検索</button>
</form>

<h3>検索結果</h3>
<?php
foreach ($hotels as $hotel) {
    $A = $methods->FindResult($hotel['prefecture'], $PrefectureKeyword);
    $B = $methods->FindResult($hotel['hotel_name'], $HotelKeyword);
    $C = $methods->FindResult($hotel['detail'], $DetailKeyword);
    if ($A and $B and $C) {
        echo '<div class="media">';
        echo '<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">';
        echo sprintf('<a href="/hotels/show.php/%s">', $hotel['id']);
        echo sprintf('<img class="media-object" src="%s" alt="hotel_picture" style="width: 100%; height: auto">', $hotel['image_url']);
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
}
?>

            </div>
        </div>
    </div>
</div>

