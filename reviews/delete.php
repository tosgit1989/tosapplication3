<?php
require_once ('../app.php');
$hotel = $dataConnect->findHotel($HotelId);
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">レビューの削除</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--レビュー削除対象のホテル-->
                <div class="media">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <a href="/hotels/show.php/<?php echo $hotel['id'] ?>">
                            <img class="media-object" src="<?php echo $hotel['image_url'] ?>" alt="hotel_picture" style="width: 100%; height: auto">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                        <h4 class="media-heading"><a href="/hotels/show.php/<?php echo $hotel['id'] ?>"><?php echo $hotel['hotel_name'] ?></a></h4>
                    </div>
                </div>

                <h3>本当に削除しますか？</h3>
                <a href="/reviews/exec.php/delete=<?php echo $ReviewId ?>">はい</a>
                <div style="height: 30px"></div>

            </div>
        </div>
    </div>
</div>

