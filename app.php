<?php
require_once ('../src/Services/DataHandler.php');
require_once ('../src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$hotels = $dataConnect->getHotelAll();
$methods = new \Services\Methods();
?>

