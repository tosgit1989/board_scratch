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
}
?>