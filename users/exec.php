<?php
require_once ('../app.php');
$dataConnect->updateUser($_POST['nickname'], $_POST['email'], ['id'=> $UserId]);
header('Location: /hotels/top_page.php');
?>