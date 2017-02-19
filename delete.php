<?php
require_once ('app.php');
?>

<!-- コンテンツ -->
<div class="page-title">
    <p class="page-title-text">記事の削除</p>
</div>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

                    <?php
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
                    ?>
                    <p>本当に削除しますか？</p>
                    <form method="POST" action="/exec.php/<?php echo $ArticleId ?>">
                        <div class="form-group">
                            <input class="form-control" name="exectype" type="hidden" value="delete">
                        </div>
                        <button type="submit" class="btn btn-danger">はい</button>
                    </form>

                </div>
            </div>
        </div>
    </div><!--/container-->

</div><!--/main-contents-->
