<?php
require_once ('app.php');
$ArticleId = $methods->getArticleId($_SERVER['REQUEST_URI']);
?>

<html>
<body>

<!-- ヘッダー -->
記事の削除

<!-- コンテンツ -->
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

<!-- フッター -->


</body>
</html>