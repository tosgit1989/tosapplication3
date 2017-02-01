<?php
namespace Services;
class Methods{
    //getHotelId($request)
    public function getHotelId($request){
        $hId = 0;
        if (preg_match('"hotels/show.php"', $request)) {
            //ホテル詳細ページにいる時
            $hId = array_pop(explode('/', $request));
        } elseif (preg_match('"reviews"', $request) and preg_match('"hotelId="', $request)) {
            //レビュー新規作成時
            $hId = array_pop(explode('=', array_pop(explode('/', $request))));
        }
        return $hId;
    }

    //getReviewId($request)
    public function getReviewId($request) {
        $rId = 0;
        if (preg_match('"reviews"', $request) and preg_match('"hotelId="', $request)) {
            //レビュー新規作成時
            $rId = 'new';
        } elseif (preg_match('"reviews"', $request) and !preg_match('"hotelId="', $request)) {
            //レビュー編集時または削除時
            $rId = array_pop(explode('/', $request));
        }
        return $rId;
    }

    // getHeaderStatus($SessionId)
    public function getHeaderStatus($SessionId) {
        if (isset($SessionId)) {
            return '';
        } else {
            return 'hidden';
        }
    }

    // getTabStatus($tab)
    public function getTabStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $TabStatus = ['tab1' => '', 'tab2' => ''];
        $TabStatus[$tab] = 'active';
        return $TabStatus;
    }

    // getContentStatus($tab)
    public function getContentStatus($tab) {
        if (!isset($tab)) {
            $tab = 'tab1';
        }
        $ContentStatus = ['tab1' => 'hidden', 'tab2' => 'hidden'];
        $ContentStatus[$tab] = '';
        return $ContentStatus;
    }

    //matchKeyword($Parameter, $Keyword)
    public function matchKeyword($Parameter, $Keyword) {
        if (strlen($Keyword) == 0) {
            //キーワード未入力の場合、0を返す
            return 0;
        } elseif (preg_match("'" . $Keyword . "'", $Parameter)) {
            //キーワード入力→一致ありの場合、1を返す
            return 1;
        } else {
            //キーワード入力→一致なしの場合、-1を返す
            return -1;
        }
    }
}
?>