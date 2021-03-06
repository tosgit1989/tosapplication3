<?php
require_once ('../app.php');
$review = $dataConnect->getById($reviewId, 'reviews');
$hotel = $dataConnect->getById($review['hotel_id'], 'hotels');
?>

<div class="page-title">
    <p class="page-title-text">レビューの削除</p>
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
                <form method="POST" action="/reviews/exec.php/<?php echo $reviewId ?>">
                    <div class="form-group">
                        <input class="form-control" name="exectype" type="hidden" value="delete">
                    </div>
                    <button class="btn btn-danger" type="submit">削除</button>
                    <a href="/users/show.php/<?php echo $userId ?>" class="btn" style="background-color: silver; color: black">いいえ</a>
                </form>
                <div style="height: 30px"></div>

            </div>
        </div>
    </div>
</div>