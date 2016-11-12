<?php
require_once ('../app.php');
$KeywordArray = $methods->getEachKeyword($_SERVER['REQUEST_URI']);
$PrefectureKeyword =array_pop(explode('=', $KeywordArray[0]));
$HotelKeyword =array_pop(explode('=', $KeywordArray[1]));
$DetailKeyword =array_pop(explode('=', $KeywordArray[2]));
$PrefectureKeyword = $_POST['prefecture'];
$HotelKeyword = $_POST['hotel'];
$DetailKeyword = $_POST['detail'];
$redirectPath = 'Location: /hotels/search.php/p=' . $PrefectureKeyword . '_h=' . $HotelKeyword . '_d=' . $DetailKeyword;
header($redirectPath);
?>
