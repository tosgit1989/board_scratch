<?php
require_once ('app.php');
$ArticleId = $methods->getArticleId($_SERVER['REQUEST_URI']);
?>

<html>
<body>

<!-- ヘッダー -->
記事の新規作成

<!-- コンテンツ -->
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
    <button type="submit">投稿する</button>
</form>

<!-- フッター -->


</body>
</html>