<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?php 
    if (isset($_SESSION['errors'])) { 
        $error = 'true';   
    } else {
        $error = 'false';
    }
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card p-2" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="<?= base_url('/images/uploads/userimage/' . $user->userimage) ?>" class="img-fluid rounded-start" alt="<?= $user->username ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $user->username ?></h4>
                                </li>
                                <?php if ($user->fullname) { ?>
                                    <li class="list-group-item">
                                        <h4><?= $user->fullname ?></h4>
                                    </li>
                                <?php } ?>
                                <li class="list-group-item">
                                    <h4><?= $user->email ?></h4>
                                </li>
                                <li class="list-group-item">
                                    <span class="badge bg-<?= ($user->name == 'admin' ? 'success' : 'info') ?>"><?= $user->name ?></span>
                                </li>
                                <li class="list-group-item">
                                    <small>
                                        <a href="<?= base_url('admin') ?>">&laquo; Back</a>
                                    </small>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Edit</a>
                                    <!-- HTTP Spoofing -->
                                    <form action="/po/delete/" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"> Delete </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>admin/update/<?= $user->userid ?>" method="post" enctype="multipart/form-data">
            <div class="row">
            
                <?= csrf_field() ?>
                <?= view('Myth\Auth\Views\_message_block') ?>

                <div class="col-md-12">
                    <label for="fullName" class="form-label <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullname" value="<?= (is_null(old('fullname'))) ? $user->fullname : old('fullname') ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"  name="email" id="email" placeholder="adrian@email.com" value="<?= (is_null(old('email'))) ? $user->email : old('email') ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" value="<?= (is_null(old('username'))) ? $user->username : old('username') ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password">
                </div>
                <div class="col-md-6">
                    <label for="pass_confirm" class="form-label">Re-type Password</label>
                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm">
                </div>
                <small id="emailHelp" class="form-text text-muted">Tidak perlu diisi apabila tidak ganti password</small>
                <div class="col-md-6 mt-2">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <?php foreach ($groups as $group) { ?>
                            <option value="<?= $group->id; ?>" <?php echo ($group->name === $user->name) ? 'selected' : ''?>><?= $group->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <!--Image-->
                    <div class="mb-4 d-flex justify-content-center">
                        <img id="selectedImage" src="<?= base_url('/images/uploads/userimage/' . $user->userimage) ?>"
                        alt="example placeholder" style="width: 150px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-outline-primary btn-rounded btn-sm">
                            <label class="form-label m-1" for="userimage">Choose file</label>
                            <input type="file" class="form-control d-none" id="userimage" name="userimage" onchange="displaySelectedImage(event, 'selectedImage')" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="saveEdit">Save Changes</button>
                </div>
            </div>
        </form>
      </div>
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

    $(document).ready(function(){
        if('<?= $error ?>' === 'true') {
            $("#exampleModal").modal("show");
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
                    $( this ).off(e);
                    $(this).click();
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>