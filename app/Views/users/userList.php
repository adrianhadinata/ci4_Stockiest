<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('message')) { ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php } ?>
            <h4><?= $title ?></h4>
            <a class="btn btn-primary mt-2" href="<?= base_url('admin/create') ?>"><i class="bi bi-plus-circle"></i> User</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    <?php foreach ($users as $user) { ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->name ?></td>
                            <td>
                                <a href="<?= base_url('admin/' . $user->userid) ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>