<?php
namespace Services;
class DataHandler {
    // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=tosapplication; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = [];
        $pdo = new \PDO($dbConnect, $username, $password, $driverOptions);
        return $pdo;
    }

    // getAll($tableName)
    public function getAll($tableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $tableName . ' ORDER BY updated_at DESC';
        $query = $pdo->prepare($prepareText);
        $query->execute();
        return $query->fetchAll();
    }

    // getHotelsBySearch($pre, $nam, $det)
    public function getHotelsBySearch($pre, $nam, $det) {
        $str1 = 'address LIKE "%' . $pre . '%"';
        $str2 = 'hotel_name LIKE "%' . $nam . '%"';
        $str3 = 'detail LIKE "%' . $det . '%"';
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM hotels WHERE ' . $str1 . ' AND ' . $str2 . ' AND ' . $str3;
        $query = $pdo->prepare($prepareText);
        $query->execute();
        return $query->fetchAll();
    }

    // getById($Id, $tableName)
    public function getById($Id, $tableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $tableName . ' WHERE id = :id';
        $query = $pdo->prepare($prepareText);
        $query->execute(['id' => $Id]);
        return $query->fetch();
    }

    // getUserByEmail($Email)
    public function getUserByEmail($Email) {
        $pdo = $this->getPdo();
        $queryUser = $pdo->prepare('SELECT * FROM users where email = :email');
        $queryUser->execute(['email' => $Email]);
        return $queryUser->fetch();
    }

    // update($data, $identifier, $tableName)
    public function update($data, $identifier, $tableName) {
        $pdo = $this->getPdo();
        $paramsStr = $this->getUpdateParameterStrings($data);
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE ' . $tableName . ' SET ' . $paramsStr . ' WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
    }

    // updateUser($data, $identifier)
    public function updateUser($dataN, $dataE, $identifier) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE users SET nickname = "' . $dataN . '", email = "' . $dataE . '" WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

        // insert($data, $tableName)
    public function insert($data, $tableName) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO ' . $tableName . ' (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
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
        $keys = [];
        $vals = [];
        foreach ($data as $key => $val) {
            $keys[] = $key;
            $vals[] = $val;
        }
        $keysString = implode(',', $keys);
        $valsString = '';
        foreach ($vals as $k => $val) {
            if (!is_numeric($val)) {
                $val = "'" . $val . "'";
            }
            if ($k > 0) {
                $valsString .= ', ';
            }
            $valsString .= $val;
        }
        return [
            'val' => $valsString,
            'key' => $keysString,
        ];
    }

    // getUpdateParameterStrings($data, $isIdentify = false)
    protected function getUpdateParameterStrings($data, $isIdentify = false) {
        $keys = [];
        $vals = [];
        foreach ($data as $key => $val) {
            $keys[] = $key;
            $vals[] = $val;
        }
        $updateString = '';
        foreach ($vals as $k => $val) {
            if (!is_numeric($val)) {
                $val = "'" . $val . "'";
            }
            if ($k > 0) {
                $updateString .= ', ';
                if ($isIdentify) {
                    $updateString .= ' and ';
                }
            }
            $updateString .= sprintf('%s=%s', $keys[$k], $val);
        }
        return $updateString;
    }
}
?>