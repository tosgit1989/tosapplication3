<?php
require_once ('app.php');
?>

<div class="page-title">
    <p class="page-title-text">トップページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3 class="text-middle">新着ホテル</h3>
                <?php
                $t = 0;
                foreach ($hotels as $hotel) {
                    $t += 1;
                    if ($t <= 20) {
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
                        echo 'このホテルの';
                        echo sprintf('<a href="/reviews/new.php/hotelId=%s">レビューを書く</a>', $hotel['id']);
                        echo ' / ';
                        echo sprintf('<a href="/hotels/show.php/%s">レビュー・詳細を見る</a>', $hotel['id']);
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
                <div class="media"></div>

            </div>
        </div>
    </div>
</div>
<div style="height:30px; background-color:transparent"></div>