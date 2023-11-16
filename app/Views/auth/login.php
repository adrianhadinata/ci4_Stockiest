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

    <?= view('Myth\Auth\Views\_message_block') ?>

    <h1 class="h3 mb-3 fw-normal text-center">
        <?=lang('Auth.loginTitle')?>
    </h1> 
    
    <form action="<?= url_to('login') ?>" method="post">
		<?= csrf_field() ?>

        <!-- Email / Username -->
		<?php if ($config->validFields === ['email']): ?>
            <div class="form-floating">
                <input type="email" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?=lang('Auth.email')?>" value="<?= old('login'); ?>">
                <label for="login"><?=lang('Auth.email')?></label>
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php else: ?>
            <div class="form-floating">
                <input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="floatingInput" placeholder="<?=lang('Auth.emailOrUsername')?>" value="<?= old('login'); ?>">
                <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Password -->
        <div class="form-floating">
            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingPassword" placeholder="<?=lang('Auth.password')?>">
            <label for="floatingPassword"><?=lang('Auth.password')?></label>
            <div class="invalid-feedback">
                <?= session('errors.password') ?>
            </div>
        </div>

        <!-- Remmember Me! -->
        <?php if ($config->allowRemembering): ?>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                    <?=lang('Auth.rememberMe')?>
                </label>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center align-items-center mt-2">
            <div class="col-md-5">
                <button type="submit" class="w-100 btn btn-lg btn-primary"><?=lang('Auth.loginAction')?></button>
            </div>
            <div class="col-md-2 text-center">or</div>
            <div class="col-md-5">
                <a href="<?= url_to('register') ?>" class="w-100 btn btn-lg btn-info">Register</a>
            </div>
        </div>

        <!-- Forgot Password -->
        <?php if ($config->activeResetter): ?>
            <hr>
            <p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
        <?php endif; ?>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
    </form>
</main>

<?= $this->endSection(); ?>