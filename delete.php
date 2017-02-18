<?php
require_once ('app.php');
$ArticleId = $methods->getArticleId($_SERVER['REQUEST_URI']);
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
記事の削除

<!-- コンテンツ -->
<div class="contents">
    <?php
    echo $article['title'];
    echo $article['comment'];
    echo $article['posted_by'];
    echo $article['created_at'];
    echo $article['updated_at'];
    ?>
    <p>本当に削除しますか？</p>
    <form method="POST" action="/exec.php/<?php echo $ArticleId ?>">
        <div class="form-group">
            <input class="form-control" name="exectype" type="hidden" value="delete">
        </div>
        <button type="submit">はい</button>
    </form>
</div>

<!-- フッター -->
<footer class="bs-docs-footer" style="background-color: #000000; height: 30px">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>