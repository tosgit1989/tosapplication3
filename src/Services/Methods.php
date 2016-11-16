<?php
namespace Services;
class Methods{
    //getHotelId($request)
    public function getHotelId($request){
        $hId = 0;
        if (preg_match('"hotels/show.php"', $request)) {
            //ホテル詳細ページにいる時
            $hId = array_pop(explode('/', $request));
        } elseif (preg_match('"reviews/new.php"', $request) or preg_match('"hotelId="', $request)) {
            //レビュー新規作成時
            $hId = array_pop(explode('=', array_pop(explode('/', $request))));
        }
        return $hId;
    }

    //getReviewId($request)
    public function getReviewId($request) {
        $rId = 0;
        if (preg_match('"reviews/new.php"', $request) or preg_match('"hotelId="', $request)) {
            //レビュー新規作成時
            $rId = 'new';
        } elseif (preg_match('"reviews"', $request) or preg_match('"exec.php"', $request)) {
            //レビュー編集時または削除時
            $rId = array_pop(explode('/', $request));
        }
        return $rId;
    }

    //FindResult($Parameter, $Keyword)
    public function FindResult($Parameter, $Keyword) {
        if (strlen($Keyword) == 0 or preg_match("'" . $Keyword . "'", $Parameter)) {
            return true;
        } else {
            return false;
        }
    }
}
?>