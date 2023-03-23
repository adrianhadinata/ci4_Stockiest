<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
            <a class="btn btn-primary mt-2" href="/item/create">+ Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    <?php foreach ($items as $item) { ?>
                        <?php $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $item['item'] ?></td>
                            <td><?= $item['item'] ?></td>
                            <td>
                                <a href="/about/<?= $item['id'] ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>