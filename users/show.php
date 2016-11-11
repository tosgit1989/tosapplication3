<?php
require_once ('../app.php');
$user = $dataConnect->findUser($UserId);
?>
<html>
<body>
マイページ
<?php
echo $user['nickname'];
echo $user['email'];
?>
<p>レビュー一覧</p>
<?php
foreach ($reviews as $review) {
    if ($review['user_id'] == $UserId) {
    echo $review['rate'];
    echo $review['review'];
    echo $review['created_at'];
    echo $review['updated_at'];
    }
}
?>
</body>
</html>