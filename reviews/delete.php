<?php
require_once ('../app.php');
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">レビューの削除</p>
</div>
<p>本当に削除しますか？</p>

<?php
echo '<a href="/reviews/exec.php/h=broken_r=';
echo $ReviewId;
echo '_u=';
echo $UserId;
echo '">はい</a>';
?>