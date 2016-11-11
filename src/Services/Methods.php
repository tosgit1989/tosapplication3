<?php
namespace Services;
class Methods{
    // get_hotel_id($request)
    public function get_hotel_id($request) {
        $hotel_id = null;
        if (preg_match('"/hotels/show.php/"', $request)) {
           $hotel_id = array_pop(explode('/', $request));
        }
        return $hotel_id;
    }
}
?>