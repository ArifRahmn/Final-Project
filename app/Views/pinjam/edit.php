<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->
<div class="container">
    <div class="row">
        <div class="col-8">

            <form action="/pinjam/update/<?= $pinjam['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $pinjam['slug']; ?>">
                <div class="form-grpup row">
                    <label for="kodebuku" class="col-sm-3 col-form-label"><b>Kode Buku</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('kodebuku')) ? 'is-invalid' : ''; ?>" id="kodebuku" name="kodebuku" autofocus value="<?= (old('kodebuku')) ? old('kodebuku') : $pinjam['kodebuku']  ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kodebuku'); ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-grpup row">
                    <label for="namapeminjam" class="col-sm-3 col-form-label"><b>Nama Penyewa</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="namapeminjam" name="namapeminjam" value="<?= (old('namapeminjam')) ? old('namapeminjam') : $pinjam['namapeminjam']  ?>">
                    </div>
                </div>
                <br>
                <div class="form-grpup row">
                    <label for="tanggalpeminjaman" class="col-sm-3 col-form-label"><b>Tanggal Sewa</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tanggalpeminjaman" name="tanggalpeminjaman" value="<?= (old('tanggalpeminjaman')) ? old('tanggalpeminjaman') : $pinjam['tanggalpeminjaman']  ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="lamapeminjaman" class="col-sm-3 col-form-label">Lama Sewa</label>
                    <div class="col-sm-9">
                        <select type="text" name="lamapeminjaman" class="form-control" id="lamapeminjaman" value="<?= (old('lamapeminjaman')) ? old('lamapeminjaman') : $pinjam['lamapeminjaman']  ?>">
                            <option value="1 Hari">1 Hari</option>
                            <option value="3 Hari">3 Hari</option>
                            <option value="5 Hari">5 Hari</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class=" form-grpup row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Ganti Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>