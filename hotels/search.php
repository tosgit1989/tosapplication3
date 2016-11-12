<?php
require_once ('../app.php');
$hotels = $dataConnect->getHotelAll();
$KeywordArray = $methods->getEachKeyword($_SERVER['REQUEST_URI']);
$PrefectureKeyword =array_pop(explode('=', $KeywordArray[0]));
$HotelKeyword =array_pop(explode('=', $KeywordArray[1]));
$DetailKeyword =array_pop(explode('=', $KeywordArray[2]));
?>
<html>
<body>
ホテルを検索
<form method="POST" action="/hotels/exec.php">
    <div class="form-group">
        <input class="form-control" placeholder="都道府県を入力" name="prefecture" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="ホテル名を入力" name="hotel" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="詳細情報を入力" name="detail" type="text">
    </div>
    <button type="submit">検索</button>
</form>
<?php
foreach ($hotels as $hotel) {
    $A = $methods->FindResult($hotel['prefecture'], $PrefectureKeyword);
    $B = $methods->FindResult($hotel['hotel_name'], $HotelKeyword);
    $C = $methods->FindResult($hotel['detail'], $DetailKeyword);
    if ($A and $B and $C) {
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
}
?>
</body>
</html>