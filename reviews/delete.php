<?php
require_once ('../app.php');
?>
<html>
<body>
レビューの削除
<p>本当に削除しますか？</p>
<?php
echo sprintf('<a href="/reviews/exec.php/h=broken_r=%s_u=broken">はい</a>', $ReviewId);
?>
</body>
</html>