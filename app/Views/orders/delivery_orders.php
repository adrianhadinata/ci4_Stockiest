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
            <a class="btn btn-primary mt-2" href="/do/create" style="margin-bottom: 1rem;">+ Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover" id="datatable" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Item Name</th>
                        <th>Remarks</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    <?php foreach ($transactions as $item) { ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $item['item'] ?></td>
                            <td><?= $item['remarks'] ?></td>
                            <td><?= $item['amount'] ?></td>
                            <td>
                                <a href="/detaildo/<?= $item['id'] ?>"><button class="btn btn-primary" type="button">Detail</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>