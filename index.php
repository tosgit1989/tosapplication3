<?php
session_start();
if ($_SESSION['id'] < 1) {
    header('Location: /users/sign_in.php');
} else {
    header('Location: /hotels/top_page.php');
}
?>