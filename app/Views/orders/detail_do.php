<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h4><?= $title ?></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12" id="pdfArea" style="font-size: 2rem;">
            <table>
                <tr>
                    <th>Item Name:</th>
                    <td><?= $items[0]['item'] ?></td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td><?= $items[0]['date_created'] ?></td>
                </tr>
                <tr>
                    <th>Last Modified: </th>
                    <td><?= $items[0]['date_modified'] ?></td>
                </tr>
                <tr>
                    <th>Amount:</th>
                    <td><?= $items[0]['amount'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-12 mt-3">
            <a href="/do/edit/<?= $items[0]['id'] ?>" class="btn btn-primary">Edit</a>
            <!-- HTTP Spoofing -->
            <form action="/do/delete/<?= $items[0]['id'] ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger"> Delete </button>
                <button type="button" class="btn btn-info" onclick="printJS({ printable: 'pdfArea', type: 'html', header: '<h1>Detail Mutation Stock</h1><h5>CV. Sarana | Printed date: <?= Date('D-m-y H:i:s') ?></h5>' })">Print</button>
                <a href="/about">Back</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>