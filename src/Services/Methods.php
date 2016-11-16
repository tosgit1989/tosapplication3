<?php
namespace Services;
    class Methods{
    // getEachId($request)
    public function getEitherId($request) {
        $hId = 0;
        $rId = 0;
        if (preg_match('"hotels"', $request)) {
            $hId = array_pop(explode('/', $request));
        // レビュー新規作成時
        } elseif (preg_match('"reviews"', $request) and preg_match('"hotelId"', $request)) {
            $hId = array_pop(explode('=', array_pop(explode('/', $request))));
            $rId = 'new';
        // レビュー編集時または削除時
        } elseif (preg_match('"reviews"', $request)) {
            $rId = array_pop(explode('/', $request));
        }
        return array($hId, $rId);
    }

    //getEachKeyword
    public function getEachKeyword($request) {
        $KeywordArray = explode('_', array_pop(explode('/', $request)));
        return $KeywordArray;
    }

    //FindResult()
    public function FindResult($Parameter, $Keyword) {
        if (strlen($Keyword) == 0 or strpos($Parameter, $Keyword) !== false) {
            return true;
        } else {
            return false;
        }
    }
}
?>