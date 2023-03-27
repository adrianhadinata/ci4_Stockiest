<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="/do/save" method="post">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="item">Item Name: </label>
                        <select name="item" id="item" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" autofocus>
                            <option value="">Select</option>
                            <?php foreach ($items as $item) { ?>
                                <option value="<?= $item['id'] ?>"><?= $item['item'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= validation_show_error('item'); ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="amount">Amount: </label>
                        <input type="text" name="amount" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= old('amount'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('amount'); ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="remarks">Remarks: </label>
                        <input type="text" name="remarks" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= old('remarks'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('remarks'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-10">
                        <a href="/do/">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>