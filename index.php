<?php
require_once ('app.php');
$articles = $dataConnect->getAll();
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
    <p class="page-title-text">トップページ</p>
</div>
<a href="new.php">記事を新規作成する</a>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

                    <?php
                    if (count($articles) >= 1) {
                        foreach ($articles as $article) {
                            echo '<div class="panel panel-primary">';
                            echo sprintf('<div class="panel-heading"><strong>%s</strong></div>', $article['title']);
                            echo sprintf('<div class="panel-body">%s</div>', $article['comment']);
                            echo '<div class ="panel-footer" style = "height: 55px">';
                            echo sprintf('<div class="col-xs-3">投稿者: %s</div>', $article['posted_by']);
                            echo sprintf('<div class="col-xs-3">作成: %s</div>', $article['created_at']);
                            echo sprintf('<div class="col-xs-3">更新: %s</div>', $article['updated_at']);
                            echo '<div class="col-xs-3">';
                            echo sprintf('<a href="edit.php/%s" class="btn btn-primary" style="margin-right: 3px">編集</a>', $article['id']);
                            echo sprintf('<a href="delete.php/%s" class="btn btn-danger">削除</a>', $article['id']);
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>投稿はありません。</p>';
                    }
                    ?>

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