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

    // getById($Id, $TableName)
    public function getById($Id, $TableName) {
        $pdo = $this->getPdo();
        $prepareText = 'SELECT * FROM ' . $TableName . ' WHERE id = :id';
        $query = $pdo->prepare($prepareText);
        $query->execute(['id' => $Id]);
        return $query->fetch();
    }

    // insert($data, $TableName)
    public function insert($data, $TableName) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO ' . $TableName . ' (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // update($data, $identifier, $TableName)
    public function update($data, $identifier, $TableName) {
        $pdo = $this->getPdo();
        $paramsStr = $this->getUpdateParameterStrings($data);
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'UPDATE ' . $TableName . ' SET ' . $paramsStr . ' WHERE ' . $identifierStr;
        var_dump($prepareText);
        $query = $pdo->prepare($prepareText);
        $query->execute();
    }

    // delete($identifier, $TableName)
    public function delete($identifier, $TableName) {
        $pdo = $this->getPdo();
        $identifierStr = $this->getUpdateParameterStrings($identifier, true);
        $prepareText = 'DELETE FROM ' . $TableName . ' WHERE ' . $identifierStr;
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