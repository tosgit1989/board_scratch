<?php
require_once ('app.php');

if ($_POST['exectype'] == 'new') {
    // 記事の新規作成時
    $articleNew['title'] = $_POST['title'];
    $articleNew['comment'] = $_POST['comment'];
    $articleNew['posted_by'] = $_POST['posted_by'];
    $articleNew['updated_at'] = $now = date('Y/m/d H:i:s');
    $articleNew['created_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->insert($articleNew, 'articles');
    header('Location: ../');
} elseif ($_POST['exectype'] == 'edit') {
    // 記事の更新時
    $articleUpd['title'] = $_POST['title'];
    $articleUpd['comment'] = $_POST['comment'];
    $articleUpd['posted_by'] = $_POST['posted_by'];
    $articleUpd['updated_at'] = $now = date('Y/m/d H:i:s');
    $dataConnect->update($articleUpd, ['id' => $articleId], 'articles');
    header('Location: ../');
} elseif ($_POST['exectype'] == 'delete') {
    $dataConnect->delete(['id' => $articleId], 'articles');
    header('Location: ../');
}
?>