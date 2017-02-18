<?php
require_once ('app.php');
$ArticleId = $methods->getArticleId($_SERVER['REQUEST_URI']);
$article = $dataConnect->getById($ArticleId, 'articles');
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
記事の編集

<!-- コンテンツ -->
<div class="contents">
    <form method="POST" action="/exec.php/<?php echo $ArticleId ?>">
        <div class="form-group">
            <label for="posted_by"><strong>投稿者</strong></label>
            <input required="required" class="form-control" placeholder="投稿者を入力" name="posted_by" id="posted_by" type="text" value="<?php echo $article['posted_by'] ?>"><br>
            <label for="title"><strong>タイトル</strong></label>
            <input required="required" class="form-control" placeholder="タイトルを入力" name="title" id="title" type="text" value="<?php echo $article['title'] ?>"><br>
            <label for="comment"><strong>コメント</strong></label>
            <input required="required" class="form-control" placeholder="コメントを入力" name="comment" id="comment" type="text" value="<?php echo $article['comment'] ?>"><br>
            <input class="form-control" name="exectype" type="hidden" value="edit">
        </div>
        <button type="submit">更新する</button>
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