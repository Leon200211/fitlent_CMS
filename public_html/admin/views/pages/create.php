<?php
$this->theme->header();
?>

<main>
    <div class="container">
        <div class="col-9">
            <h1>Create page</h1>

            <form>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Content</label>
                    <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder"></textarea>
                </div>
            </form>
        </div>


        <div class="col-3">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>


    </div>
</main>

<?php
$this->theme->footer();
?>
