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

    // getAll($TableName)
    public function getAll($TableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $TableName . ' ORDER BY updated_at DESC';
        $query = $pdo->prepare($prepareText);
        $query->execute();
        return $query->fetchAll();
    }

    // findById($Id, $TableName)
    public function findById($Id, $TableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $TableName . ' WHERE id = :id';
        $query = $pdo->prepare($prepareText);
        $query->execute(['id' => $Id]);
        return $query->fetch();
    }

    // findUserByEmail($Email)
    public function findUserByEmail($Email) {
        $pdo = $this->getPdo();
        $queryUser = $pdo->prepare('SELECT * FROM users where email = :email');
        $queryUser->execute(['email' => $Email]);
        return $queryUser->fetch();
    }

    // updateUser($data, $identifier)
    public function updateUser($dataN, $dataE, $identifier) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE users SET nickname = "' . $dataN . '", email = "' . $dataE . '" WHERE ' . $identifierStr;
        var_dump($prepareText);
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
        var_dump($prepareText);
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