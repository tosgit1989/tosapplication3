<?php
require_once ('../app.php');
$review = $dataConnect->findById($ReviewId, 'reviews');
$hotel = $dataConnect->findById($review['hotel_id'], 'hotels');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">レビューの編集</p>
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
                <form method="POST" action="/reviews/exec.php/edit=<?php echo $review['id'] ?>">
                    <div class="form-group">
                        <p><strong>レート</strong></p>
                        <?php
                        foreach(range(1, 10) as $i) {
                            echo '<div class="radio-inline"><input type="radio" value="';
                            echo $i;
                            echo '" name="rate" ';
                            if ($review['rate'] == $i) {
                                echo 'checked="checked"';
                            }
                            echo '><label>';
                            echo $i;
                            echo '</label></div>';
                        }
                        ?>
                        <p><strong>レビュー</strong></p>
                        <input required="required" class="form-control" placeholder="レビューを入力" name="review" type="text" value="<?php echo $review['review'] ?>"><br>
                        <input class="form-control" name="exectype" type="hidden" value="edit">
                    </div>
                    <button class="btn btn-primary" type="submit">更新する</button>
                    <a href="/users/show.php/<?php echo $UserId ?>" class="btn" style="background-color: silver; color: black" type="submit">キャンセル</a>
                </form>

            </div>
        </div>
    </div>
</div>
<div style="height:30px; background-color:transparent"></div>