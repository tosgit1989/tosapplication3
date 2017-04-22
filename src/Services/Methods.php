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

    // getHeaderStatus($sessionId)
    public function getHeaderStatus($sessionId) {
        if (isset($sessionId)) {
            return '';
        } else {
            return 'hidden';
        }
    }

    // getTabOrContentSta($type, $tabNum)
    public function getTabOrContentSta($activeNum, $type) {
        // $activeNum(選択状態の番号)の初期値
        if (!isset($activeNum)) {
            $activeNum = 1;
        }

        // ステータスのArrayを作成
        $staArrForTab = [];
        $staArrForContent = [];
        $i = 1;
        while ($i <= 100) {
            if ($i == $activeNum) {
                // $iが選択状態の番号である場合
                $staArrForTab += [$i => 'active'];
                $staArrForContent += [$i => ''];
            } else {
                // $iが選択状態の番号でない場合
                $staArrForTab += [$i => ''];
                $staArrForContent += [$i => 'hidden'];
            }
            $i ++;
        }

        // $typeがtabならタブステータス、contentならコンテントステータスをArray形式で返す
        if ($type == 'tab') {
            return $staArrForTab;
        } elseif ($type == 'content') {
            return $staArrForContent;
        } else {
            return '';
        }
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