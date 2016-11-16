<?php
require_once ('../app.php');
$hotel = $dataConnect->findById($HotelId, 'hotels');
$reviews = $dataConnect->getAll('reviews');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white"><?php echo $hotel['hotel_name'] ?></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <div class="media">
                    <!--ホテルの画像-->
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <img class="media-object" src="<?php echo $hotel['image_url'] ?>" alt="hotel_picture" style="width: 100%; height: auto">
                    </div>

                    <!--中間余白-->
                    <div class="col-sm-2 col-md-4 col-lg-6"></div>

                    <!--ホテル投稿画面へのリンク-->
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <a href="/reviews/new.php/hotelId=<?php echo $hotel['id'] ?>" class="btn btn-primary" role="button" style="width: 100%">レビューを書く</a> <!--「レビューを書く」をクリックすると投稿ページに移動-->
                    </div>

                </div><!--/media-->

                <div class="media"></div> <!--この行は隙間確保用-->

                <div>
                    <div>
                        <!--detailなどを表示-->
                        <h3 class="text-middle">詳細情報</h3>
                        <?php echo $hotel['detail'] ?><br>
                        【宿泊料金】<?php echo $hotel['fee1'] ?><?php echo $hotel['fee2'] ?><br>
                        <?php echo $hotel['access'] ?>
                        <div class="media"></div> <!--この行はフッターとの隙間確保用-->
                    </div>
                    <div>
                        <!--みんなのレビューを表示-->
                        <h3 class="text-middle">みんなのレビュー</h3>
                        <?php
                        foreach ($reviews as $review) {
                            if ($review['hotel_id'] == $HotelId) {
                                $user = $dataConnect->findById($review['user_id'], 'users');
                                echo '<div class="media">';
                                echo '<div class="media-body">';
                                echo '<h4 class="media-heading">';
                                echo $user['nickname'];
                                echo '</h4>';
                                echo $review['review'];
                                echo '</br>';
                                echo '評価: ';
                                echo $review['rate'];
                                echo '</br>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <div class="media"></div> <!--この行はフッターとの隙間確保用-->
                    </div>
                </div>
                <!-- /コンテンツ-->

            </div>
        </div>
    </div>
</div>
<div style="height:30px; background-color:transparent"></div>
