<?php
require_once ('../app.php');
$hotels = $dataConnect->getAll('hotels');
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
                <form method="POST" action="/hotels/search.php">
                    <div class="form-group">
                        <p><strong>都道府県</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="prefecture" type="text" value="<?php $_POST['prefecture'] ?>"><br>
                        <p><strong>ホテル名</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="hotel_name" type="text" value="<?php $_POST['hotel_name'] ?>"><br>
                        <p><strong>詳細情報</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="detail" type="text" value="<?php $_POST['detail'] ?>"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">検索</button>
                </form>

                <h3>検索結果</h3>
                <?php
                foreach ($hotels as $hotel) {
                    $A = $methods->matchKeyword($hotel['address'], $_POST['prefecture']);
                    $B = $methods->matchKeyword($hotel['hotel_name'], $_POST['hotel_name']);
                    $C = $methods->matchKeyword($hotel['detail'], $_POST['detail']);
                    if ($A >= 0 and $B  >= 0 and $C >= 0 and abs($A) + abs($B) + abs($C) >= 1) {
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
                        echo sprintf('<a href="/reviews/new.php/hotelId=%s">このホテルのレビューを書く</a>', $hotel['id']);
                        echo sprintf('<a href="/hotels/show.php/%s">このホテルのレビュー・詳細を見る</a>', $hotel['id']);
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