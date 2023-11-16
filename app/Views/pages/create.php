<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4><?= $title ?></h4>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/item/save" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="item">Item Name: </label>
                                        <input type="text" name="item" class="form-control <?= (validation_show_error('item')) ? 'is-invalid' : ''; ?> mt-2" value="<?= old('judul'); ?>" autofocus>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('item'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category">Category: </label>
                                        <select name="category" id="category" class="form-control <?= (validation_show_error('category')) ? 'is-invalid' : ''; ?> mt-2">
                                            <option>Select Category</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('category'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                <label for="modal">Harga Modal: </label>
                                <input type="text" name="modal" id="modal" class="form-control <?= (validation_show_error('modal')) ? 'is-invalid' : ''; ?> mt-2" value="<?= old('modal'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('modal'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jual">Harga Jual: </label>
                                <input type="text" name="jual" id="jual" class="form-control <?= (validation_show_error('jual')) ? 'is-invalid' : ''; ?> mt-2" value="<?= old('jual'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('jual'); ?>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--Image-->
                                <div class="mb-4 d-flex justify-content-center">
                                    <img id="selectedImage" src="/images/uploads/itemimage/no-item.webp"
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
                        <div class="form-group row mt-3">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <div class="col-10">
                                <a href="/about">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#modal').mask('000.000.000', {
            reverse: true
        });

        $('#jual').mask('000.000.000', {
            reverse: true
        });
    })
</script>

<?= $this->endSection(); ?>