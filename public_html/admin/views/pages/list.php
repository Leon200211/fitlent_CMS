<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>
                        Pages
                        <a href="/admin/pages/create/">Create page</a>
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
                <?php foreach($pages as $page): ?>
                    <tr>
                        <th scope="row"><?= $page['id'] ?></th>
                        <td>
                            <a href="/admin/page/edit/<?= $page['id'] ?>">
                                <?= $page['title'] ?>
                            </a>
                        </td>
                        <td><?= $page['content'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

<?php $this->theme->footer(); ?>