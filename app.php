<?php
require_once ('../src/Services/DataHandler.php');
require_once ('../src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$idArray = $methods->getEachId($_SERVER['REQUEST_URI']);
$HotelId = array_pop(explode('=', $idArray[0]));
$ReviewId = array_pop(explode('=', $idArray[1]));
$UserId = array_pop(explode('=', $idArray[2]));
?>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<html>
<body>

<!--ヘッダー-->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/hotels/index.php">hotelication</a>
        </div>
        <div class="navbar-header">
            <a class="active navbar-brand" href="/hotels/search.php/p=_h=_d=_">ホテルを検索</a>
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