<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-6"></div>
        <div class="col-6 d-flex">
            <img class="my-auto mx-auto" src="<?= $warehouse ?>" width="300px" alt="Home Background">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>