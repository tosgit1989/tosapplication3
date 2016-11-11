<?php
namespace Services;
class DataHandler {
    // get_pdo()
    protected function get_pdo() {
        $db_connect = 'mysql:dbname=tosapplication_development; host=127.0.0.1; charset=utf8';
        $user_name = 'root';
        $password = '';
        $driver_options = array();
        $pdo = new \PDO($db_connect, $user_name, $password, $driver_options);
        return $pdo;
    }

    // hotel_all()
    public function all() {
        $pdo = $this->get_pdo();
        $hotel_query = $pdo->prepare('SELECT * FROM hotels order by updated_at desc');
        $hotel_query->execute();
        return $hotel_query->fetchAll();
    }
}
?>