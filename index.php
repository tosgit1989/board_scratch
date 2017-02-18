<?php
require_once ('app.php');
$articles = $dataConnect->getAll();
?>

<html>
<body>

<!-- ヘッダー -->
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" href="/">board</a>
        </div>
    </div>
</nav>
トップページ
<a href="new.php">記事を新規作成する</a>

<!-- コンテンツ -->
<div class="contents">
    <?php
    foreach ($articles as $article) {
        echo $article['title'];
        echo $article['comment'];
        echo $article['posted_by'];
        echo $article['created_at'];
        echo $article['updated_at'];
        echo sprintf('<a href="edit.php/%s">編集</a>', $article['id']);
        echo sprintf('<a href="delete.php/%s">削除</a>', $article['id']);
    }
    ?>
</div>

<!-- フッター -->
<footer class="bs-docs-footer" style="background-color: #000000; height: 30px">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>