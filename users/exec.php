<?php
require_once ('../app.php');
$user['email'] = $_POST['email'];
$user['nickname'] = $_POST['nickname'];
$dataConnect->updateUser($user, ['id'=>$UserId]);
header('Location: /hotels/index.php');
?>