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
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownBarang">
                        <a class="nav-link" href="/about">Daftar Barang</a>
                        <a class="nav-link" href="/po">Stok Masuk</a>
                        <?php if (in_groups("admin")) : ?>
                            <a class="nav-link" href="/do">Stok Keluar</a>
                        <?php endif; ?>
                        <a class="nav-link" href="/sales">Penjualan</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                        <?php if (in_groups("admin")) : ?>
                            <a class="nav-link" href="/admin">Daftar User</a>
                        <?php endif; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="vr-line">|&nbsp; &nbsp;</span><?= user()->username ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="nav-link" href="<?= base_url('logout') ?>">Log Out</a>
                        <a class="nav-link" href="<?= base_url('profile') ?>">Profil Saya</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>