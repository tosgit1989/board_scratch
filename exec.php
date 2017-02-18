<?php
require_once ('app.php');
$ArticleId = $methods->getArticleId($_SERVER['REQUEST_URI']);



if ($_POST['exectype'] == 'new') {
    // 記事の新規作成時
    $article['title'] = $_POST['title'];
    $article['comment'] = $_POST['comment'];
    $article['posted_by'] = $_POST['posted_by'];
    $article['updated_at'] = $now = date('Y/m/d H:i:s');
    $article['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insert($article, 'articles');
    header('Location: ../');
} elseif ($_POST['exectype'] == 'edit') {
    // 記事の更新時
    $article['title'] = $_POST['title'];
    $article['comment'] = $_POST['comment'];
    $article['posted_by'] = $_POST['posted_by'];
    $article['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->update($article, ['id' => $ArticleId], 'articles');
    header('Location: ../');
} elseif ($_POST['exectype'] == 'delete') {
    $dataConnect->delete(['id' => $ArticleId], 'articles');
    header('Location: ../');
}
?>