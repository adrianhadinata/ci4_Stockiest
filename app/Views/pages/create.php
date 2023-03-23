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
            <label for="item">Item Name: </label>
            <input type="text" name="item" class="form-control">
            <a href="#" class="btn btn-primary">Save</a>
            <a href="/about">Back</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>