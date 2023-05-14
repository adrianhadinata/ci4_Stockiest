<?= $this->extend('layouts/login') ?>

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
    <form action="/login" method="post">
        <?= csrf_field() ?>
        <img class="mb-4" src="<?= $logo ?>" alt="" width="100%">
        <h1 class="h3 mb-3 fw-normal text-center"></h1>
        <div class="form-floating">
            <input type="text" name="username" class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Your username" value="<?= old('username'); ?>">
            <label for="floatingInput">Username</label>
            <div class="invalid-feedback">
                <?= validation_show_error('username'); ?>
            </div>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Your password">
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
                <?= validation_show_error('password'); ?>
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
    </form>
</main>

<?= $this->endSection(); ?>