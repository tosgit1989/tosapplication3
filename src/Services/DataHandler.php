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

    // getReviewAll()
    public function getReviewAll() {
        $pdo = $this->getPdo();
        $queryReview = $pdo->prepare('SELECT * FROM reviews order by updated_at desc');
        $queryReview->execute();
        return $queryReview->fetchAll();
    }

    // findHotel($HotelId)
    public function findHotel($HotelId) {
        $pdo = $this->getPdo();
        $queryHotel = $pdo->prepare('SELECT * FROM hotels where id = :id');
        $queryHotel->execute(['id' => $HotelId]);
        return $queryHotel->fetch();
    }

    // findUser($UserId)
    public function findUser($UserId) {
        $pdo = $this->getPdo();
        $queryUser = $pdo->prepare('SELECT * FROM users where id = :id');
        $queryUser->execute(['id' => $UserId]);
        return $queryUser->fetch();
    }

    // insert($data)
    public function insert($data) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO reviews (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // getKeyAndValsStrings($data)
    protected function getKeysAndValsStrings($data) {
        $Keys = array();
        $Vals = array();
        foreach ($data as $aKey => $aVal) {
            $Keys[] = $aKey;
            $Vals[] = $aVal;
        }
        $KeysString = implode(',', $Keys);
        $ValsString = '';
        foreach ($Vals as $bKey => $aVal) {
            if (!is_numeric($aVal)) {
                $aVal = "'" . $aVal . "'";
            }
            if ($bKey > 0) {
                $ValsString .= ', ';
            }
            $ValsString .= $aVal;
        }
        return [
            'val' => $ValsString,
            'key' => $KeysString,
        ];
    }
}
?>