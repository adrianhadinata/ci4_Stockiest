<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<main class="form-signin">
    <?php if (session()->getFlashdata('message')) { ?>
        <div class="alert alert-danger mt-2" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php } ?>
    <form action="<?= url_to('registerAdmin') ?>" method="post">

        <?= csrf_field() ?>

        <h1 class="h3 mb-3 fw-normal text-center">
            <?=lang('Auth.register')?>
        </h1> 

        <?= view('Myth\Auth\Views\_message_block') ?>

        <!-- Email -->
        <div class="form-floating">
            <input type="text" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email'); ?>">
            <label for="email">Email</label>
            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
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

        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <button type="submit" class="w-100 btn btn-lg btn-primary">Register</button>
            </div>
        </div>
        <hr>

        <p><a href="<?= route_to('login') ?>"><?=lang('Auth.alreadyRegistered')?><?=lang('Auth.signIn')?></a></p>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
    </form>
</main>

<?= $this->endSection(); ?>