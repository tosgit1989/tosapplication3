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

    // getMediaHtml($id, $name, $image, $detail)
    public function getMediaHtml($id, $name, $image, $detail) {
        $html = '<div class="media">'
                . '<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">'
                . sprintf('<a href="/hotels/show.php/%s">', $id)
                . '<img class="media-object" src="' . $image . '" alt="hotel_picture" style="width: 100%; height: auto">'
                . '</a>'
                . '</div>'
                . '<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">'
                . '<h4 class="media-heading">'
                . sprintf('<a href="/hotels/show.php/%s">', $id)
                . $name
                . '</a>'
                . '</h4>'
                . $detail
                . '<br>'
                . '<strong>このホテルの </strong>'
                . sprintf('<a href="/reviews/new.php/hotelId=%s" class="btn btn-primary" >レビューを書く</a>', $id)
                . ' '
                . sprintf('<a href="/hotels/show.php/%s" class="btn btn-primary" >レビュー・詳細を見る</a>', $id)
                . '</div>'
                . '</div>';
        return $html;
    }

}
?>