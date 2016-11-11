<?php
namespace Services;
class DataHandler {
    // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=tosapplication_development; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = [];
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

    // findReview($ReviewId)
    public function findReview($ReviewId) {
        $pdo = $this->getPdo();
        $queryReview = $pdo->prepare('SELECT * FROM reviews where id = :id');
        $queryReview->execute(['id' => $ReviewId]);
        return $queryReview->fetch();
    }

    // findUser($UserId)
    public function findUser($UserId) {
        $pdo = $this->getPdo();
        $queryUser = $pdo->prepare('SELECT * FROM users where id = :id');
        $queryUser->execute(['id' => $UserId]);
        return $queryUser->fetch();
    }

    // insertReview($data)
    public function insertReview($data) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO reviews (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // updateReview($data, $identifier)
    public function updateReview($data, $identifier) {
        $pdo = $this->getPdo();
        $params_str = $this->getUpdateParameterStrings($data);
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE reviews SET ' . $params_str . ' WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // deleteReview($identifier)
    public function deleteReview($identifier) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'DELETE FROM reviews WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // getKeyAndValsStrings($data)
    protected function getKeysAndValsStrings($data) {
        $Keys = [];
        $Vals = [];
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

    // getUpdateParameterStrings($data, $isIdentify = false)
    protected function getUpdateParameterStrings($data, $isIdentify = false) {
        $Keys = [];
        $Vals = [];
        foreach ($data as $aKey => $aVal) {
            $Keys[] = $aKey;
            $Vals[] = $aVal;
        }
        $updateString = '';
        foreach ($Vals as  $bKey => $aVal) {
            if (!is_numeric($aVal)) {
                $aVal = "'" . $aVal . "'";
            }
            if ($bKey > 0) {
                $updateString .= ', ';
                if ($isIdentify) {
                    $updateString .= ' and ';
                }
            }
            $updateString .= sprintf('%s=%s', $Keys[$bKey], $aVal);
        }
        return $updateString;
    }
}
?>