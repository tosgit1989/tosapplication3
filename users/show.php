<?php
require_once ('../app.php');
$reviews = $dataConnect->getReviewAll();
$user = $dataConnect->findUser($UserId);
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">マイページ</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--コンテンツ-->
                <div id="myTabContent" class="tab-content">
                    <div>
                        <!--自分の基本情報を表示-->
                        <h3 class="text-middle">基本情報</h3>
                        <h4>ニックネーム  : <?php $user['nickname'] ?></h4>
                        <h4>メールアドレス: <?php $user['email'] ?></h4>
                        <a href=/users/edit.php/h=0_r=0_u=<?php $user['id'] ?>" class="btn btn-primary" role="button">編集</a>
                        <div class="media"></div> <!--この行はフッターとの隙間確保用-->
                    </div>
                    <div>
                        <!--自分の投稿したものを表示-->
                        <h3 class="text-middle"><?php $user['nickname'] ?>さんのレビュー一覧</h3>
                        <?php
                        foreach ($reviews as $review) {
                            if ($review['user_id'] == $UserId) {
                                $hotel = $dataConnect->findHotel($review['hotel_id']);
                                echo '<div class="media">';
                                echo '<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">';
                                echo sprintf('<a href="/hotels/show.php/h=%s_r=', $review['hotel_id']);
                                echo $review['id'];
                                echo sprintf('_u=%s>', $user['id']);
                                echo sprintf('<img class="media-object" src="%s" alt="hotel_picture" style="width: 100%; height: auto">', $hotel['image_url']);
                                echo '</a>';
                                echo '</div>';
                                echo '<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">';
                                echo '<h4 class="media-heading">';
                                echo sprintf('<a href="/hotels/show.php/h=%s_r=', $review['hotel_id']);
                                echo $review['id'];
                                echo sprintf('_u=%s>', $user['id']);
                                echo $hotel['hotel_name'];
                                echo '</a>';
                                echo '</h4>';
                                echo $review['review'];
                                echo '</br>';
                                echo '評価: ';
                                echo $review['rate'];
                                echo '</br>';
                                echo 'このレビューを';
                                echo '<a href="/reviews/edit.php/h=';
                                echo $review['hotel_id'];
                                echo '_r=';
                                echo $review['id'];
                                echo '_u=';
                                echo $user['id'];
                                echo '">編集</a>';
                                echo '<a href="/reviews/delete.php/h=';
                                echo $review['hotel_id'];
                                echo '_r=';
                                echo $review['id'];
                                echo '_u=';
                                echo $user['id'];
                                echo '">削除</a>';
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

