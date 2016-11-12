<?php
require_once ('../app.php');
?>
レビューの削除
<p>本当に削除しますか？</p>
<?php
echo '<a href="/reviews/exec.php/h=broken_r=';
echo $ReviewId;
echo '_u=';
echo $UserId;
echo '">はい</a>';
?>
