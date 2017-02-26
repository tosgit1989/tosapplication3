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