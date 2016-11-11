<?php
namespace Services;
class DataHandler {
    // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=tosapplication_development; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = array();
        $pdo = new \PDO($dbConnect, $username, $password, $driverOptions);
        return $pdo;
    }

    // getHotelAll()
    public function getHotelAll() {
        $pdo = $this->getPdo();
        $queryHotel = $pdo->prepare('SELECT * FROM hotels order by updated_at desc');
        $queryHotel->execute();
        return $queryHotel->fetchAll();
    }

    // findHotel($HotelId)
    public function findHotel($HotelId) {
        $pdo = $this->getPdo();
        $queryHotel = $pdo->prepare('SELECT * FROM hotels where id = :id');
        $queryHotel->execute(['id' => $HotelId]);
        return $queryHotel->fetch();
    }
}
?>