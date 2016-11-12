<?php
namespace Services;
class Methods{
    // getEachId($request)
    public function getEachId($request) {
        //$request='/reviews/edit.php/h=1_r=1_u=1'
        if ($request == '/hotels/index.php' or in_array('"hotels/search.php"', $request)) {
            $idArray = array('h=0', 'r=0', 'u=0');
        } else {
            $idArray = explode('_', array_pop(explode('/', $request)));
        }
        return $idArray;
    }

    //getEachKeyword
    public function getEachKeyword($request) {
        $KeywordArray = explode('_', array_pop(explode('/', $request)));
        return $KeywordArray;
    }

    //jouken()
    public function FindResult($Parameter, $Keyword) {
        if (strlen($Keyword) == 0 or strpos($Parameter, $Keyword) !== false) {
            return true;
        } else {
            return false;
        }
    }
}
?>