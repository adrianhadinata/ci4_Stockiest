<style>
    .switch {
        display: inline-block;
        position: relative;
        margin-top: 0.5rem;
        margin-left:0.5rem;
    }

    .switch__input {
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        width: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
    }

    .switch__label {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 15px;
        background-color: #2B2B2B;
        border: 5px solid #5B5B5B;
        border-radius: 9999px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(.46,.03,.52,.96);
    }

    .switch__indicator {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translateX(-72%);
        display: block;
        width: 10px;
        height: 10px;
        background-color: #7B7B7B;
        border-radius: 9999px;
        box-shadow: 10px 0px 0 0 rgba(#000000, 0.2) inset;

        &::before,
        &::after {
            position: absolute;
            content: '';
            display: block;
            background-color: #FFFFFF;
            border-radius: 9999px;
        }

        &::before {
            top: 7px;
            left: 7px;
            width: 9px;
            height: 9px;
            background-color: #FFFFFF;
            opacity: 0.6;
        }

        &::after {
            bottom: 8px;
            right: 6px;
            width: 14px;
            height: 14px;
            background-color: #FFFFFF;
            opacity: 0.8;
        }
    }

    .switch__decoration {
        position: absolute;
        top: 65%;
        left: 50%;
        display: block;
        width: 5px;
        height: 5px;
        background-color: #FFFFFF;
        border-radius: 9999px;
        animation: twinkle 0.8s infinite -0.6s;

        &::before,
        &::after {
            position: absolute;
            display: block;
            content: '';
            width: 5px;
            height: 5px;
            background-color: #FFFFFF;
            border-radius: 9999px;
        }

        &::before {
            top: -20px;
            left: 10px;
            opacity: 1;
            animation: twinkle 0.6s infinite;
        }

        &::after {
            top: -7px;
            left: 30px;
            animation: twinkle 0.6s infinite -0.2s;
        }
    }

    @keyframes twinkle {
        50% { opacity: 0.2; }
    }

    .switch__indicator {
        &,
        &::before,
        &::after {
            transition: all 0.4s cubic-bezier(.46,.03,.52,.96);
        }
    }

    .switch__input:checked + .switch__label {
        background-color: #8FB5F5;
        border-color: #347CF8;

        .switch__indicator {
            background-color: #ECD21F;
            box-shadow: none;
            transform: translate(-50%, -50%) translateX(72%);

            &::before,
            &::after {
                display: none;
            }
        }

        .switch__decoration {
            top: 50%;
            transform: translate(0%, -50%);
            animation: cloud 8s linear infinite;

            width: 10px;
            height: 10px;

            &::before {
                width: 10px;
                height: 10px;
                top: auto;
                bottom: 0;
                left: -8px;
                animation: none;
            }

            &::after {
                width: 15px;
                height: 15px;
                top: auto;
                bottom: 0;
                left: 16px;
                animation: none;
            }

            &,
            &::before,
            &::after {
                border-radius: 9999px 9999px 0 0;
            }

            &::after {
                border-bottom-right-radius: 9999px;
            }
        }
    }

    @keyframes cloud {
        0% {
            transform: translate(0%, -50%);
        }
        50% {
            transform: translate(-50%, -50%);
        }
        100% {
            transform: translate(0%, -50%);
        }
    }

</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="/">Your Company Name</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBarang" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Barang
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownBarang">
                        <a class="dropdown-item" href="/about">Daftar Barang</a>
                        <a class="dropdown-item" href="/po">Stok Masuk</a>
                        <?php if (in_groups("admin")) : ?>
                            <a class="dropdown-item" href="/do">Stok Keluar</a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="/sales">Penjualan</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownUser">
                        <?php if (in_groups("admin")) : ?>
                            <a class="dropdown-item" href="/admin">Daftar User</a>
                        <?php endif; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="vr-line">|&nbsp; &nbsp;</span><?= user()->username ?>
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('logout') ?>">Log Out</a>
                        <a class="dropdown-item" href="<?= base_url('profile') ?>">Profil Saya</a>
                    </div>
                </li>
                <li class="nav-item">
                <div class="switch">
                    <input type="checkbox" class="switch__input" id="Switch">
                    <label class="switch__label" for="Switch">
                        <span class="switch__indicator"></span>
                        <span class="switch__decoration"></span>
                    </label>
                </div>
                </li>
            </ul>
        </div>
    </div>
</nav>