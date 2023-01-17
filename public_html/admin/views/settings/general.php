<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Settings</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form>
                        <?php foreach($settings as $setting):?>
                            <div class="form-group row">
                                <label for="formNameSite" class="col-2 col-form-label">
                                    <?= $setting['name'] ?>
                                </label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="<?= $setting['key_field'] ?>" value="<?= $setting['value'] ?>" id="formNameSite">
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="form-group row">
                            <label for="formLangSite" class="col-2 col-form-label">
                                Language
                            </label>
                            <div class="col-10">
                                <select class="form-control" id="formLangSite">
                                    <option value="english">English</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>