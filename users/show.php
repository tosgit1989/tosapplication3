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
</body>
</html>