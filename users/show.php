<?php
require_once ('../app.php');
$fromUser = $dataConnect->getById($userId, 'users');
$tabStatus = $methods->getTabOrContentSta($_POST['actNum'], 'tab');
$contentStatus = $methods->getTabOrContentSta($_POST['actNum'], 'content');
?>

<div class="page-title">
    <p class="page-title-text">マイページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--タブ-->
                <ul class="nav nav-tabs">
                    <li class=<?php echo $tabStatus[1] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform1.submit();return false;">基本情報</a>
                        <form name="tabform1" method="POST" action="/users/show.php/<?php echo $userId ?>">
                            <input type="hidden" name="actNum" value=1>
                        </form>
                    </li>
                    <li class=<?php echo $tabStatus[2] ?>>
                        <a href="" data-toggle="tab" onclick="document.tabform2.submit();return false;">レビュー一覧</a>
                        <form name="tabform2" method="POST" action="/users/show.php/<?php echo $userId ?>">
                            <input type="hidden" name="actNum" value=2>
                        </form>
                    </li>
                </ul>
                <!-- / タブ-->
                <!--コンテンツ-->
                <div id="myTabContent" class="tab-content">
                    <div <?php echo $contentStatus[1] ?>>
                        <!--自分の基本情報を表示-->
                        <h3 class="text-middle">基本情報</h3>
                        <h4>ニックネーム  : <?php echo $user['nickname'] ?></h4>
                        <h4>メールアドレス: <?php echo $user['email'] ?></h4>
                        <a href="/users/edit.php/<?php echo $user['id'] ?>" class="btn btn-primary" role="button">編集</a>
                        <div class="media"></div> <!--この行はフッターとの隙間確保用-->
                    </div>
                    <div <?php echo $contentStatus[2] ?>>
                        <!--自分の投稿したものを表示-->
                        <h3 class="text-middle"><?php echo $user['nickname'] ?>さんのレビュー一覧</h3>
                        <?php
                        foreach ($reviews as $review) {
                            if ($review['user_id'] == $userId) {
                                $hotel = $dataConnect->getById($review['hotel_id'], 'hotels');
                                echo '<div class="media">';
                                echo '<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">';
                                echo sprintf('<a href="/hotels/show.php/%s">', $review['hotel_id']);
                                echo '<img class="media-object" src="';
                                echo $hotel['image_url'];
                                echo '" alt="hotel_picture" style="width: 100%; height: auto">';
                                echo '</a>';
                                echo '</div>';
                                echo '<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">';
                                echo '<h4 class="media-heading">';
                                echo sprintf('<a href="/hotels/show.php/%s">', $review['hotel_id']);
                                echo $hotel['hotel_name'];
                                echo '</a>';
                                echo '</h4>';
                                echo $review['review'];
                                echo '<br>';
                                echo 'レート: <strong>';
                                echo $review['rate'];
                                echo '</strong> / 10';
                                echo '<br>';
                                echo '<strong>このレビューを </strong>';
                                echo sprintf('<a href="/reviews/edit.php/%s" class="btn btn-primary" >編集</a>', $review['id']);
                                echo ' ';
                                echo sprintf('<a href="/reviews/delete.php/%s" class="btn btn-danger" >削除</a>', $review['id']);
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <div class="media"></div> <!--この行はフッターとの隙間確保用-->
                    </div>
                </div>
                <!-- /コンテンツ-->

            </div>
        </div>
    </div>
</div>