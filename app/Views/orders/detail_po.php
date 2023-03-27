<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <input type="hidden" name="id" value="<?= $items[0]['id'] ?>" class="form-control">
            <label for="item">Item Name: </label>
            <input type="text" name="item" value="<?= $items[0]['item'] ?>" class="form-control" disabled><br>
            <label for="date_created">Created At: </label>
            <input type="text" name="date_created" value="<?= $items[0]['date_created'] ?>" class="form-control" disabled><br>
            <label for="date_modified">Last Modified: </label>
            <input type="text" name="date_modified" value="<?= $items[0]['date_modified'] ?>" class="form-control" disabled>
        </div>
        <div class="col-12 mt-3">
            <a href="/po/edit/<?= $items[0]['id'] ?>" class="btn btn-primary">Edit</a>
            <!-- HTTP Spoofing -->
            <form action="/po/delete/<?= $items[0]['id'] ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger"> Delete </button>
                <a href="/about">Back</a>
            </form>
            <!-- <a href="/item/delete/<?= 'coba' ?>" class="btn btn-danger">Delete</a> -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>