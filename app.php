<?php
require_once ('../src/Services/DataHandler.php');
require_once ('../src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$HotelId = $methods->getHotelId($_SERVER['REQUEST_URI']);
$ReviewId = $methods->getReviewId($_SERVER['REQUEST_URI']);

session_start();

if ($_SERVER['REQUEST_URI'] == '/users/sign_in.php') {
    //サインインページに移動した場合
    unset($_SESSION['id']);
} elseif ($_SESSION['id'] < 1) {
    //セッションが効いていない状態でサインインページ以外のページに移動した場合
    header('Location: /notice.php');
} else {
    //セッションが効いている状態でサインインページ以外のページに移動した場合
    $UserId = $_SESSION['id'];
    $user = $dataConnect->findById($UserId, 'users');
}

?>
<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body style="background-color:#d3d3d3">

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/hotels/index.php">hotelication</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="active navbar-brand" href="/hotels/search.php/">ホテルを検索</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($_SESSION['id'] >= 1 and $_SERVER['REQUEST_URI'] !== '/users/sign_in.php') {
                    echo sprintf('<li><a href="/users/show.php/%s">', $user['id']);
                    echo sprintf('現在のユーザー: %s</a></li>', $user['nickname']);
                    echo '<li><a href="/users/sign_in.php">サインアウト</a></li>';
                }

                ?>
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