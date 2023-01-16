<?php
$this->theme->header();
?>

<main>
    <div class="container">
        <h1>Pages <a href="/admin/pages/create/">Create page</a></h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
            </tr>
            </tbody>
        </table>

    </div>
</main>

<?php
$this->theme->footer();
?>
