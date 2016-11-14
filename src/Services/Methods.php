<?php
namespace Services;
class Methods{
    // getEachId($request)
    public function getEitherId($request) {
        $h0Id = 0;
        $r0Id = 0;
        $u0Id = 0;
        if (preg_match('"hotels"', $request)) {
            $h0Id = array_pop(explode('/', $request));
        // レビュー新規作成時
        } elseif (preg_match('"reviews"', $request) and preg_match('"hotelId"', $request)) {
            $h0Id = array_pop(explode('=', array_pop(explode('/', $request))));
            $r0Id = 'new';
        // レビュー編集時または削除時
        } elseif (preg_match('"reviews"', $request)) {
            $r0Id = array_pop(explode('/', $request));
        } elseif (preg_match('"users"', $request)) {
            $u0Id = array_pop(explode('/', $request));
        }
        return array($h0Id, $r0Id, $u0Id);
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