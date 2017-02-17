<?php
require_once ('app.php');
$articles = $dataConnect->getAll();
?>

<html>
<body>

<!-- ヘッダー -->
トップページ
<?php
foreach ($articles as $article) {
    echo $article['title'];
    echo $article['comment'];
    echo $article['posted_by'];
    echo $article['created_at'];
    echo $article['updated_at'];
}
?>

<!-- コンテンツ -->


<!-- フッター -->


</body>
</html>