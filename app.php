<?php
require_once ('src/Services/DataHandler.php');
require_once ('src/Services/Methods.php');
$dataConnect = new \Services\DataHandler();
$methods = new \Services\Methods();
?>
<html>
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/application.css">
</head>
<body>

<!-- ヘッダー -->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/">board</a>
        </div>
    </div>
</nav>

<!-- フッター -->
<footer class="bs-docs-footer navbar-fixed-bottom">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>