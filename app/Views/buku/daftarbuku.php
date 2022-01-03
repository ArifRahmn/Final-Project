<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->

<link rel="stylesheet" href="/CSS/style.css">
<div class="card card-primary">
    <div class="card-body">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="opsi">#</th>
                    <th scope="col" class="opsi">Cover Buku</th>
                    <th scope="col" class="opsi">Judul Buku</th>
                    <th scope="col" class="opsi">Kode Buku</th>
                    <th scope="col" class="opsi">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftarbuku as $k) : ?>
                    <tr>
                        <th scope="row" class="opsi"><?= $i++; ?></th>
                        <td class="opsi"><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                        <td class="opsi"><?= $k['judul']; ?></td>
                        <td class="opsi"><?= $k['kodebuku']; ?></td>
                        <td class="opsi">

                            <a href="/buku/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                            <a href="/pinjam/create" class="btn btn-success">Sewa Buku</a><br>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.card-body -->
<?= $this->endSection('content'); ?>