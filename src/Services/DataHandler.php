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

    // insert($data, $TableName)
    public function insert($data, $TableName) {
        $pdo = $this->getPdo();
        $res = $this->getKeysAndValsStrings($data);
        $prepareText = 'INSERT INTO ' . $TableName . ' (' . $res['key'] . ') VALUES (' . $res['val'] . ')';
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
}
?>