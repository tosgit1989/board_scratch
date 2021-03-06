<?php
require_once ('app.php');
?>

<!-- コンテンツ -->
<div class="page-title">
    <p class="page-title-text">トップページ</p>
</div>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

                    <div><a href="new.php" class="btn btn-primary" style="position: fixed; top: 66px; right: 16px">記事を新規作成する</a></div>
                    <?php
                    if (count($articles) >= 1) {
                        foreach ($articles as $articleEach) {
                            echo '<div class="panel panel-primary">';
                            echo sprintf('<div class="panel-heading"><strong>%s</strong></div>', $articleEach['title']);
                            echo sprintf('<div class="panel-body">%s</div>', $articleEach['comment']);
                            echo '<div class ="panel-footer" style = "height: 55px">';
                            echo sprintf('<div class="col-xs-3">投稿者: %s</div>', $articleEach['posted_by']);
                            echo sprintf('<div class="col-xs-3">作成: %s</div>', $articleEach['created_at']);
                            echo sprintf('<div class="col-xs-3">更新: %s</div>', $articleEach['updated_at']);
                            echo '<div class="col-xs-3">';
                            echo sprintf('<a href="edit.php/%s" class="btn btn-primary" style="margin-right: 3px">編集</a>', $articleEach['id']);
                            echo sprintf('<a href="delete.php/%s" class="btn btn-danger">削除</a>', $articleEach['id']);
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
