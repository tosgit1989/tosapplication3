<?php
require_once ('../app.php');
?>

<div class="page-title">
    <p class="page-title-text">ホテルを検索</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <h3 class="text-middle">検索</h3>
                <form method="POST" action="/hotels/search.php">
                    <div class="form-group">
                        <label for="prefecture"><strong>都道府県</strong></label>
                        <input class="form-control" placeholder="キーワードを入力" name="prefecture" id="prefecture" type="text" value="<?php echo $_POST['prefecture'] ?>"><br>
                        <label for="hotel_name"><strong>ホテル名</strong></label>
                        <input class="form-control" placeholder="キーワードを入力" name="hotel_name" id="hotel_name" type="text" value="<?php echo $_POST['hotel_name'] ?>"><br>
                        <label for="detail"><strong>詳細情報</strong></label>
                        <input class="form-control" placeholder="キーワードを入力" name="detail" id="detail" type="text" value="<?php echo $_POST['detail'] ?>"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">検索</button>
                </form>

                <hr>

                <h3>検索結果</h3>
                <?php
                foreach ($hotels as $hotel) {
                    $A = $methods->matchKeyword($hotel['address'], $_POST['prefecture']);
                    $B = $methods->matchKeyword($hotel['hotel_name'], $_POST['hotel_name']);
                    $C = $methods->matchKeyword($hotel['detail'], $_POST['detail']);
                    //各項目とも「キーワード入力→一致なし」でなければ検索結果を表示　ただし、全項目がキーワード未入力の場合は検索結果を表示しない
                    if ($A >= 0 and $B  >= 0 and $C >= 0 and abs($A) + abs($B) + abs($C) >= 1) {
                        $MediaHtml = $methods->getMediaHtml($hotel['id'], $hotel['hotel_name'], $hotel['image_url'], $hotel['detail']);
                        echo $MediaHtml;
                    }
                }
                ?>
                <div class="media"></div>

            </div>
        </div>
    </div>
</div>