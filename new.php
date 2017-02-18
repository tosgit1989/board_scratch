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
    <p class="page-title-text">記事の新規作成</p>
</div>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

                    <form method="POST" action="/exec.php/<?php echo $ArticleId ?>">
                        <div class="form-group">
                            <label for="posted_by"><strong>投稿者</strong></label>
                            <input required="required" class="form-control" placeholder="投稿者を入力" name="posted_by" id="posted_by" type="text"><br>
                            <label for="title"><strong>タイトル</strong></label>
                            <input required="required" class="form-control" placeholder="タイトルを入力" name="title" id="title" type="text"><br>
                            <label for="comment"><strong>コメント</strong></label>
                            <input required="required" class="form-control" placeholder="コメントを入力" name="comment" id="comment" type="text"><br>
                            <input class="form-control" name="exectype" type="hidden" value="new">
                        </div>
                        <button type="submit" class="btn btn-primary">投稿する</button>
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