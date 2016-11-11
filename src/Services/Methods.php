<?php
namespace Services;
class Methods{
    // getHotelId($request)
    public function getHotelId($request) {
        $HotelId = null;
        if (preg_match('"/hotels/show.php/"', $request)) {
            $HotelId = array_pop(explode('/', $request));
        }
        return $HotelId;
    }

    // getReviewId($request)
    public function getReviewId($request) {
        $ReviewId = null;
        if (preg_match('"/reviews/new.php/"', $request)) {
            $ReviewId = 'new';
        }
        return $ReviewId;
    }
}
?>