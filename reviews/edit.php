<?php
require_once ('../app.php');
$review = $dataConnect->getById($reviewId, 'reviews');
$hotel = $dataConnect->getById($review['hotel_id'], 'hotels');
?>

<div class="page-title">
    <p class="page-title-text">レビューの編集</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--投稿対象のホテル-->
                <div class="media">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                        <a href="/hotels/show.php/<?php echo $hotel['id'] ?>">
                            <img class="media-object" src="<?php echo $hotel['image_url'] ?>" alt="hotel_picture" style="width: 100%; height: auto">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                        <h4 class="media-heading"><a href="/hotels/show.php/<?php echo $hotel['id'] ?>"><?php echo $hotel['hotel_name'] ?></a></h4>
                    </div>
                </div><br>

                <!--フォーム-->
                <form method="POST" action="/reviews/exec.php/<?php echo $review['id'] ?>">
                    <div class="form-group">
                        <p><strong>レート</strong></p>
                        <?php
                        foreach(range(1, 10) as $i) {
                            echo '<div class="radio-inline"><input type="radio" value="';
                            echo $i;
                            echo sprintf('" name="rate" id="rate%s"', $i);
                            if ($review['rate'] == $i) {
                                echo 'checked="checked"';
                            }
                            echo sprintf('><label for="rate%s">', $i);
                            echo $i;
                            echo '</label></div>';
                        }
                        ?>
                        <br>
                        <label for="review"><strong>レビュー</strong></label>
                        <input required="required" class="form-control" placeholder="レビューを入力" name="review" id="review" type="text" value="<?php echo $review['review'] ?>"><br>
                        <input class="form-control" name="exectype" type="hidden" value="edit">
                    </div>
                    <button class="btn btn-primary" type="submit">更新する</button>
                    <a href="/users/show.php/<?php echo $userId ?>" class="btn" style="background-color: silver; color: black" type="submit">キャンセル</a>
                </form>

            </div>
        </div>
    </div>
</div>