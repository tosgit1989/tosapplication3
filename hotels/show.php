<?php
require_once ('../app.php');
$hotel = $dataConnect->findHotel($HotelId);
$reviews = $dataConnect->getReviewAll();
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white"><?php echo $hotel['hotel_name'] ?></p>
</div>

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
echo '<a href="/reviews/new.php/h=';
echo $hotel['id'];
echo '_r=new_u=';
echo $UserId;
echo '">このホテルのレビューを書く</a>';
?>
<p>みんなのレビュー</p>
<?php
foreach ($reviews as $review) {
    if ($review['hotel_id'] == $HotelId) {
        echo $review['rate'];
        echo $review['review'];
        echo $review['created_at'];
        echo $review['updated_at'];
    }
}

?>