<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->
<link rel="stylesheet" href="/CSS/style.css">

<div class="card-body">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="opsi">#</th>
                <th scope="col" class="opsi">Kode Buku</th>
                <th scope="col" class="opsi">Nama Peminjam</th>
                <th scope="col" class="opsi">Tanggal Peminjaman</th>
                <th scope="col" class="opsi">Lama Peminjaman</th>
                <th scope="col" class="opsi">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($Pinjamview as $k) : ?>
                <tr>
                    <th scope="row" class="opsi"><?= $i++; ?></th>
                    <td class="opsi"><?= $k['kodebuku']; ?></td>
                    <td class="opsi"><?= $k['namapeminjam']; ?></td>
                    <td class="opsi"><?= $k['tanggalpeminjaman']; ?></td>
                    <td class="opsi"><?= $k['lamapeminjaman']; ?></td>
                    <td class="opsi">

                        <a href="/pinjam/edit/<?= $k['slug']; ?>" class="btn btn-warning">Edit</a>

                        <form action="/pinjam/<?= $k['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-success">Kembalikan Buku</button>

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<?= $this->endSection('content'); ?>