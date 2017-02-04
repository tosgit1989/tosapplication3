<?php
require_once ('../app.php');
$hotel = $dataConnect->getById($HotelId, 'hotels');
?>

<div class="page-title">
    <p class="page-title-text">レビューの投稿</p>
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
                <form method="POST" action="/reviews/exec.php/hotelId=<?php echo $hotel['id'] ?>">
                    <div class="form-group">
                        <p><strong>レート</strong></p>
                        <?php
                        foreach(range(1, 10) as $i) {
                            echo '<div class="radio-inline"><input type="radio" value="';
                            echo $i;
                            echo sprintf('" name="rate" id="rate%s"><label for="rate%s">', $i, $i);
                            echo '';
                            echo $i;
                            echo '</label></div>';
                        }
                        ?>
                        <br>
                        <label for="review"><strong>レビュー</strong></label>
                        <input required="required" class="form-control" placeholder="レビューを入力" name="review" id="review" type="text"><br>
                        <input class="form-control" name="exectype" type="hidden" value="new">
                    </div>
                    <button class="btn btn-primary" type="submit">投稿する</button>
                </form>

            </div>
        </div>
    </div>
</div>