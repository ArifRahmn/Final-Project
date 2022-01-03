<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->
<div class="container">
    <div class="row">
        <div class="col-8">

            <form action="/buku/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $buku['sampul']; ?>">
                <div class="form-grpup row">
                    <label for="judul" class="col-sm-2 col-form-label"><b>Judul</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul']  ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-grpup row">
                    <label for="kodebuku" class="col-sm-2 col-form-label"><b>Kode Buku</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kodebuku')) ? 'is-invalid' : ''; ?>" id="kodebuku" name="kodebuku" autofocus value="<?= (old('kodebuku')) ? old('kodebuku') : $buku['kodebuku']  ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kodebuku'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-grpup row">
                    <label for="penulis" class="col-sm-2 col-form-label"><b>Penulis</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis']  ?>">
                    </div>
                </div>
                <div class=" form-grpup row">
                    <label for="penerbit" class="col-sm-2 col-form-label"><b>Penerbit</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit']  ?>">
                    </div>
                </div>
                <div class=" form-grpup row">
                    <label for="sampul" class="col-sm-2 col-form-label"><b>Sampul</b></label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $buku['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input 
                            <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="Sampul"><?= $buku['sampul']; ?></label>
                        </div>
                    </div>
                </div>
                <br>
                <div class=" form-grpup row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>