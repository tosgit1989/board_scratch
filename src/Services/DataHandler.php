<?php
namespace Services;
class DataHandler {
        // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=board; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = [];
        $pdo = new \PDO($dbConnect, $username, $password, $driverOptions);
        return $pdo;
    }

    // getAll()
    public function getAll() {
        $pdo = $this->getPdo();
        $query = $pdo->prepare('SELECT * FROM articles ORDER BY updated_at DESC');
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

    // insert($data, $tableName)
    public function insert($data, $tableName) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO ' . $tableName . ' (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // update($data, $identifier, $tableName)
    public function update($data, $identifier, $tableName) {
        $pdo = $this->getPdo();
        $paramsStr = $this->getUpdateParameterStrings($data);
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE ' . $tableName . ' SET ' . $paramsStr . ' WHERE ' . $identifierStr;
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // delete($identifier, $tableName)
    public function delete($identifier, $tableName) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'DELETE FROM ' . $tableName . ' WHERE ' . $identifierStr;
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
        foreach ($vals as $bKey => $val) {
            if (!is_numeric($val)) {
                $val = "'" . $val . "'";
            }
            if ($bKey > 0) {
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