<?php
session_start();

require_once ('var.php');

if (preg_match('"users/message.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_in.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_up.php"', $_SERVER['REQUEST_URI'])) {
    // 上記4通りの場合は、セッションが効いていなくても何もしない
} elseif ($_SESSION['id'] < 1) {
    // 上記の場合以外で、セッションが効いていない場合
    header('Location: /users/message.php/sessionTimeOut');
} else {
    //セッションが効いている場合
    $userId = $_SESSION['id'];
    $user = $dataConnect->getById($userId, 'users');
}

$headerStatus = $methods->getHeaderStatus($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>hotelication</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/application.css">
</head>
<body style="background-color:#d3d3d3">

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php
            if (isset($_SESSION['id'])) {
                echo '<a class="active navbar-brand" href="/index.php">hotelication</a>';
            } else {
                echo '<a class="active navbar-brand">hotelication</a>';
            }
            ?>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul <?php echo $headerStatus ?> class="nav navbar-nav">
                <li><a href="/hotels/search.php/">ホテルを検索</a></li>

            </ul>
            <ul <?php echo $headerStatus ?> class="nav navbar-nav navbar-right">
                <li>
                    <a style="color: white">現在のユーザー: <?php echo $user['nickname'] ?></a>
                </li>
                <li>
                    <a href="/users/show.php/<?php echo $userId ?>">マイページ</a>
                </li>
                <li>
                    <a href="/users/session.php/signOut">サインアウト</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--フッター-->
<footer class="bs-docs-footer navbar-fixed-bottom" style="background-color: #000000; height: 30px">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>