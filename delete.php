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

<!-- コンテンツ -->
<div class="page-title">
    <p class="page-title-text">記事の削除</p>
</div>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

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
            </div>
        </div>
    </div><!--/container-->

</div><!--/main-contents-->

<!-- フッター -->
<footer class="bs-docs-footer">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>

</body>
</html>