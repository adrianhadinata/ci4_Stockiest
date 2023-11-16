<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?php 
    if (isset($_SESSION['message'])) { 
        $error = 'true';
    } else {
        $error = 'false';
    }
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-5 d-flex justify-content-center">
                        <img src="<?= base_url('/images/uploads/userimage/' . user()->userimage) ?>" class="img-fluid rounded-start" alt="<?= user()->username ?>">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h5><?= user()->username ?></h5>
                                </li>
                                <?php if (user()->fullname) { ?>
                                    <li class="list-group-item">
                                        <h5><?= user()->fullname ?></h5>
                                    </li>
                                <?php } ?>
                                <li class="list-group-item">
                                    <h5><?= user()->email ?></h5>
                                </li>
                                <li class="list-group-item">
                                    <small>
                                        <a href="<?= base_url('dashboard') ?>">&laquo; Back</a>
                                    </small>
                                    <small>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-pw">Ganti Password</a>
                                    </small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pw" tabindex="-1" aria-labelledby="modal-pw" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="modal-pw-title">Change Password</h2>
            </div>
            <div class="modal-body" style="padding-right: 10rem; padding-left: 10rem">

            <form action="<?= base_url('changePassword') ?>" method="post">

                <div class="row">

                    <?= csrf_field() ?>
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="col-12">
                        <label for="oldPw">Old Password: </label>
                        <input name="oldPw" type="password" class="form-control" placeholder="****">
                    </div>
                    <div class="col-12" style="margin-top: 5px;">
                        <label for="newPw">New Password: </label>
                        <input name="newPw" type="password" class="form-control" placeholder="****">
                    </div>
                    <div class="col-12" style="margin-top: 5px;">
                        <label for="rnewPw">Repeat New Password: </label>
                        <input name="rnewPw" type="password" class="form-control" placeholder="****">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" id="saveEdit" class="btn btn-info">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        if('<?= $error ?>' === 'true') {
            $("#modal-pw").modal("show");
        }

        $("#saveEdit").on("click", function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).off(e);
                    $(this).click();
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>