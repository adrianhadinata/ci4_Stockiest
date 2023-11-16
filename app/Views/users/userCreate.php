<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h4 class="text-center"><?= $title ?></h4>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col-md-6">
            <main class="form-signin">
                <?php if (session()->getFlashdata('message')) { ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php } ?>
                <form action="<?= url_to('registerAdmin') ?>" method="post" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="d-flex">

                        <div class="row w-50">
                            <div class="col-md-12">
                                <!-- Full Name -->
                                <div class="form-floating">
                                    <input type="text" name="fullname" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="floatingInputName" placeholder="<?=lang('Auth.fullname')?>" value="<?= old('fullname'); ?>">
                                    <label for="floatingInputName">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- Email -->
                                <div class="form-floating">
                                    <input type="text" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email'); ?>">
                                    <label for="email">Email</label>
                                    <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row w-50">
                            <div class="col-md-12">
                                <!--Image-->
                                <div class="mb-4 d-flex justify-content-center">
                                    <img id="selectedImage" src="/images/user/no-image.png"
                                    alt="example placeholder" style="width: 150px;" />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-outline-primary btn-rounded btn-sm">
                                        <label class="form-label m-1" for="userimage">Choose file</label>
                                        <input type="file" class="form-control d-none" id="userimage" name="userimage" onchange="displaySelectedImage(event, 'selectedImage')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Username -->
                    <div class="form-floating mt-2">
                        <input type="text" name="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?=lang('Auth.username')?>" value="<?= old('username'); ?>">
                        <label for="floatingInput">Username</label>
                    </div>

                    <!-- Password -->
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?=lang('Auth.password')?>">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>">
                                <label for="pass_confirm">Repeat Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center mt-2">
                        <div class="col-md-12">
                            <button type="submit" class="w-100 btn btn-lg btn-primary">Register</button>
                        </div>
                    </div>

                </form>
            </main>
        </div>
    </div>
</div>

<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

<?= $this->endSection(); ?>