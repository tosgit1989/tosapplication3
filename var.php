<?php
require_once ('/Users/kagatoshio/projects/tosapplication3/src/Services/DataHandler.php');
require_once ('/Users/kagatoshio/projects/tosapplication3/src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$hotelId = $methods->getHotelId($_SERVER['REQUEST_URI']);
$reviewId = $methods->getReviewId($_SERVER['REQUEST_URI']);
$hotels = $dataConnect->getAll('hotels');
$reviews = $dataConnect->getAll('reviews');
?>