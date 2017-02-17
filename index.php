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
    echo sprintf('<a href="edit.php/%s">編集</a>', $article['id']);
    echo sprintf('<a href="delete.php/%s">削除</a>', $article['id']);
}
?>


<!-- フッター -->


</body>
</html>