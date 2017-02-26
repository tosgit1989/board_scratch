<?php
require_once ('src/Services/DataHandler.php');
require_once ('src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
$articleId = $methods->getarticleId($_SERVER['REQUEST_URI']);
$articles = $dataConnect->getAll();
$article = $dataConnect->getById($articleId, 'articles');
?>