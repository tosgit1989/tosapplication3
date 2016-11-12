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
<div><a href="/hotels/index.php">hotelication</a></div>
<div><a href="/hotels/search.php/p=_h=_d=_">ホテルを検索</a></div>
