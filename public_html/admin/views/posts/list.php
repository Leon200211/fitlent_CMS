<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col post-title">
                    <h3>
                        Posts
                        <a href="/admin/posts/create/">Create post</a>
                    </h3>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <th scope="row"><?= $post['id'] ?></th>
                        <td>
                            <a href="/admin/post/edit/<?= $post['id'] ?>">
                                <?= $post['title'] ?>
                            </a>
                        </td>
                        <td><?= $post['content'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

<?php $this->theme->footer(); ?>