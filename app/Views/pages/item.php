<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="hidden" name="id" value="<?= $items['id'] ?>" class="form-control">
            <label for="item">Item Name: </label>
            <input type="text" name="item" value="<?= $items['item'] ?>" class="form-control">
            <label for="date_created">Created At: </label>
            <input type="text" name="date_created" value="<?= $items['date_created'] ?>" class="form-control" disabled>
            <label for="date_modified">Last Modified: </label>
            <input type="text" name="date_modified" value="<?= $items['date_modified'] ?>" class="form-control" disabled>
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>