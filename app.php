<?php
require_once ('../src/Services/DataHandler.php');
require_once ('../src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$idArray = $methods->getEitherId($_SERVER['REQUEST_URI']);
$HotelId = $idArray[0];
$ReviewId = $idArray[1];

session_start();
if ($_SESSION['id'] >= 1 or $_SERVER['REQUEST_URI'] == '/users/sign_in.php') {
    $UserId = $_SESSION['id'];
} else {
    header('Location: /notice.php');
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
                <li><a class="active navbar-brand" href="/hotels/search.php/p=_h=_d=_">ホテルを検索</a></li>
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