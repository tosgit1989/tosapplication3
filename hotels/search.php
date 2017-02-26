<?php
require_once ('../app.php');
$hotelssearched = $dataConnect->getHotelsBySearch($_POST['prefecture'], $_POST['hotel_name'], $_POST['detail']);

// 各入力値の初期値
$fPost = ['prefecture' => '', 'hotel_name' => '', 'detail' => ''];
// 以下の場合に初期値から変更
if (isset($_POST['prefecture'])) $fPost['prefecture'] = $_POST['prefecture'];
if (isset($_POST['hotel_name'])) $fPost['hotel_name'] = $_POST['hotel_name'];
if (isset($_POST['detail'])) $fPost['detail'] = $_POST['detail'];
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
                        <input class="form-control" placeholder="キーワードを入力" name="prefecture" id="prefecture" type="text" value="<?php echo $fPost['prefecture'] ?>"><br>
                        <label for="hotel_name"><strong>ホテル名</strong></label>
                        <input class="form-control" placeholder="キーワードを入力" name="hotel_name" id="hotel_name" type="text" value="<?php echo $fPost['hotel_name'] ?>"><br>
                        <label for="detail"><strong>詳細情報</strong></label>
                        <input class="form-control" placeholder="キーワードを入力" name="detail" id="detail" type="text" value="<?php echo $fPost['detail'] ?>"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">検索</button>
                </form>

                <hr>

                <h3>検索結果</h3>
                <?php
                if ($fPost['prefecture'] == '' and $fPost['hotel_name'] == '' and $fPost['detail'] == '') {
                    echo 'キーワードを入力してください。';
                } else {
                    foreach ($hotelssearched as $hotel) {
                        $mediaHtml = $methods->getMediaHtml($hotel['id'], $hotel['hotel_name'], $hotel['image_url'], $hotel['detail']);
                            echo $mediaHtml;
                    }
                }
                ?>
                <div class="media"></div>

            </div>
        </div>
    </div>
</div>