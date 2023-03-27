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
            <form action="/do/update/<?= $item[0]['id'] ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group row">
                    <div class="col-4">
                        <label for="item">Item Name: </label>
                        <input type="text" name="item" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= $item[0]['item']; ?>" disabled>
                        <div class="invalid-feedback">
                            <?= validation_show_error('item'); ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="amount">Amount: </label>
                        <input type="text" name="amount" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= $item[0]['amount']; ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('amount'); ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="remarks">Remarks: </label>
                        <input type="text" name="remarks" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= $item[0]['remarks']; ?>">
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
                        <a href="/do">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>