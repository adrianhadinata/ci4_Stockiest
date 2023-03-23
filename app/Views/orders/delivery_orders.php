<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
        </div>
        <div class="col">
            <table class="table table-striped table-hover">
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>