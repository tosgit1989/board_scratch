<?php
require_once ('app.php');
?>

<!-- コンテンツ -->
<div class="page-title">
    <p class="page-title-text">記事の編集</p>
</div>
<div class="main-contents">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bs-docs-section">

                    <form method="POST" action="/exec.php/<?php echo $ArticleId ?>">
                        <div class="form-group">
                            <label for="posted_by"><strong>投稿者</strong></label>
                            <input required="required" class="form-control" placeholder="投稿者を入力" name="posted_by" id="posted_by" type="text" value="<?php echo $article['posted_by'] ?>"><br>
                            <label for="title"><strong>タイトル</strong></label>
                            <input required="required" class="form-control" placeholder="タイトルを入力" name="title" id="title" type="text" value="<?php echo $article['title'] ?>"><br>
                            <label for="comment"><strong>コメント</strong></label>
                            <input required="required" class="form-control" placeholder="コメントを入力" name="comment" id="comment" type="text" value="<?php echo $article['comment'] ?>"><br>
                            <input class="form-control" name="exectype" type="hidden" value="edit">
                        </div>
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </form>

                </div>
            </div>
        </div>
    </div><!--/container-->

</div><!--/main-contents-->