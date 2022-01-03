<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!-- /.card-header -->
<a href="/Buku/create" class="btn btn-primary mt-3">Tambah Data Buku</a><br>
<link rel="stylesheet" href="/CSS/style.css">
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="card-body">


    <table class="table">
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
            <?php foreach ($Bukuview as $k) : ?>
                <tr>
                    <th scope="row" class="opsi"><?= $i++; ?></th>
                    <td class="opsi"><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                    <td class="opsi"><?= $k['judul']; ?></td>
                    <td class="opsi"><?= $k['kodebuku']; ?></td>
                    <td class="opsi">
                        <a href="/buku/edit/<?= $k['slug']; ?>" class="btn btn-warning">Edit</a>

                        <form action="/buku/<?= $k['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<?= $this->endSection('content'); ?>