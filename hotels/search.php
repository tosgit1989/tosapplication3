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
                        <p><strong>都道府県</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="prefecture" type="text" value="<?php echo $_POST['prefecture'] ?>"><br>
                        <p><strong>ホテル名</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="hotel_name" type="text" value="<?php echo $_POST['hotel_name'] ?>"><br>
                        <p><strong>詳細情報</strong></p>
                        <input class="form-control" placeholder="キーワードを入力" name="detail" type="text" value="<?php echo $_POST['detail'] ?>"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">検索</button>
                </form>

                <p style="border-bottom: 1px solid black"></p>
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