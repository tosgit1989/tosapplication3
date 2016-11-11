<?php
require_once ('../app.php');
$reviews = $dataConnect->getReviewAll();
$user = $dataConnect->findUser($UserId);
?>
<html>
<body>
マイページ
<?php
echo $user['nickname'];
echo $user['email'];
echo '<a href="/users/edit.php/h=0_r=0_u=';
echo $UserId;
echo '">編集</a>'
?>
<p>レビュー一覧</p>
<?php
foreach ($reviews as $review) {
    if ($review['user_id'] == $UserId) {
    echo $review['rate'];
    echo $review['review'];
    echo $review['created_at'];
    echo $review['updated_at'];
    echo '<a href="/reviews/edit.php/h=';
    echo $review['hotel_id'];
    echo '_r=';
    echo $review['id'];
    echo '_u=';
    echo $UserId;
    echo '">編集</a>';
    echo '<a href="/reviews/delete.php/h=';
    echo $review['hotel_id'];
    echo '_r=';
    echo $review['id'];
    echo '_u=';
    echo $UserId;
    echo '">削除</a>';
    }
}
?>
</body>
</html>