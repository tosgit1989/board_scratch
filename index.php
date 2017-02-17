<?php
require_once ('app.php');
$articles = $dataConnect->getAll();
?>

<html>
<body>

<!-- ヘッダー -->
トップページ
<a href="new.php">記事を新規作成する</a>

<!-- コンテンツ -->
<?php
foreach ($articles as $article) {
    echo $article['title'];
    echo $article['comment'];
    echo $article['posted_by'];
    echo $article['created_at'];
    echo $article['updated_at'];
}
?>


<!-- フッター -->


</body>
</html>