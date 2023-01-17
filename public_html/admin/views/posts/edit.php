<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col post-title">
                    <h3><?= $post['title'] ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPost">
                        <input type="hidden" name="post_id" id="formPostId" value="<?=$post['id']?>">
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="formTitle" value="<?= $post['title'] ?>" placeholder="Title post...">
                        </div>
                        <div class="form-group">
                            <label for="formContent">Content</label>
                            <textarea name="content" class="form-control" id="redactor" id="formContent">
                                <?= $post['content'] ?>
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <div>
                        <p>Update this post</p>
                        <button type="submit" class="btn btn-primary" onclick="post.update()">
                            Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>