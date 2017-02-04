<?php
require_once ('/Users/kagatoshio/projects/tosapplication3/src/Services/DataHandler.php');
require_once ('/Users/kagatoshio/projects/tosapplication3/src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$HotelId = $methods->getHotelId($_SERVER['REQUEST_URI']);
$ReviewId = $methods->getReviewId($_SERVER['REQUEST_URI']);
$hotels = $dataConnect->getAll('hotels');
$reviews = $dataConnect->getAll('reviews');

session_start();

if (preg_match('"users/session.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/message.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_in.php"', $_SERVER['REQUEST_URI'])
    or preg_match('"users/sign_up.php"', $_SERVER['REQUEST_URI'])) {
    // 上記4通りの場合は、セッションが効いていなくても何もしない
} elseif ($_SESSION['id'] < 1) {
    // 上記の場合以外で、セッションが効いていない場合
    header('Location: /users/message.php/SessionTimeOut');
} else {
    //セッションが効いている場合
    $UserId = $_SESSION['id'];
    $user = $dataConnect->getById($UserId, 'users');
}

$HeaderStatus = $methods->getHeaderStatus($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>hotelication</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/application.css">
</head>
<body style="background-color:#d3d3d3">

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/hotels/top_page.php">hotelication</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul <?php echo $HeaderStatus ?> class="nav navbar-nav">
                <li><a href="/hotels/search.php/">ホテルを検索</a></li>

            </ul>
            <ul <?php echo $HeaderStatus ?> class="nav navbar-nav navbar-right">
                <li>
                    <a style="color: white">現在のユーザー: <?php echo $user['nickname'] ?></a>
                </li>
                <li>
                    <a href="/users/show.php/<?php echo $UserId ?>">マイページ</a>
                </li>
                <li style="max-height: 50px">
                    <a href="" data-toggle="link" onclick="document.SignOut.submit();return false;">サインアウト</a>
                    <form name="SignOut" method="POST" action="/users/session.php">
                        <input type="hidden" name="SignInOrUpOrOut" value="SignOut">
                    </form>
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