<?php
namespace Services;
class Methods{
    // getHotelId($request)
    public function getHotelId($request) {
        $HotelId = null;
        if (preg_match('"/hotels/show.php/"', $request)) {
            $HotelId = array_pop(explode('/', $request));
        } elseif (preg_match('"/reviews/new.php/"', $request)) {
            // HotelIdはreviews/new.phpにも必要
            $containHotelId = array_pop(explode('/', $request));
            $HotelId = array_pop(explode('=', $containHotelId));
            // HotelIdはreviews/exec.phpにも必要
        } elseif (preg_match('"/reviews/exec.php/"', $request)) {
            $containHotelId = array_pop(explode('/', $request));
            $HotelId = array_pop(explode('=', $containHotelId));
        }
        return $HotelId;
    }

    // getReviewId($request)
    public function getReviewId($request) {
        $ReviewId = null;
        if (preg_match('"/reviews/new.php/"', $request)) {
            $ReviewId = 'new';
        } elseif (preg_match('"/reviews/exec.php/"', $request)) {
            $ReviewId = 'new';
        }
        return $ReviewId;
    }
}
?>