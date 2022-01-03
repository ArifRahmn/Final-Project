<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->
<link rel="stylesheet" href="/CSS/style.css">
<div class="container">
    <div class="row">
        <div class="col-8">

            <form action="/pinjam/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="kodebuku" class="col-sm-2 col-form-label"><b>Kode Buku</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kodebuku')) ? 'is-invalid' : ''; ?>" id="kodebuku" name="kodebuku" autofocus value="<?= (old('kodebuku')) ?>">
                    </div>
                </div>
                <div class="form-grpup row">
                    <label for="penulis" class="col-sm-2 col-form-label"><b>Nama Anda</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namapeminjam" name="namapeminjam" value="<?= old('namapeminjam'); ?>">
                    </div>
                </div>
                <br>
                <div class="form-grpup row">
                    <label for="penulis" class="col-sm-2 col-form-label"><b>Tanggal Sewa</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggalpeminjaman" name="tanggalpeminjaman" value="<?= old('tanggalpeminjaman'); ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="lamapeminjaman" class="col-sm-2 col-form-label">Lama Sewa</label>
                    <div class="col-sm-6">
                        <select name="lamapeminjaman" class="form-control" id="lamapeminjaman">
                            <option value="1 Hari">1 Hari</option>
                            <option value="3 Hari">3 Hari</option>
                            <option value="5 Hari">5 Hari</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class=" form-grpup row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sewa Buku</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>