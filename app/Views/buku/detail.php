<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/CSS/style.css">
<a href="<?= route_to("user.daftarbuku") ?>" class=" btn btn-danger">Kembali ke Daftar Buku</a> <br><br>
<div class="opsi">

    <div class="card card-primary">

        <div class="card-body">
            <table class="table table-bordered">

                <div style="max-width: 540px;">

                    <thead>
                        <tr>
                            <th class="opsi">Cover</th>
                            <th class="opsi">Judul</th>
                            <th class="opsi">Kode Buku</th>
                            <th class="opsi">Penulis</th>
                            <th class="opsi">Penerbit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="opsi">
                                <div class="text-center">
                                    <img src=" /img/<?= $buku['sampul']; ?>" class="col-md-7" alt="...">
                                </div>
                            </th>
                            <div class="col-md-8">

                                <th class="opsi">
                                    <h5 class="opsi"><?= $buku['judul']; ?></h5><br>
                                </th>
                                <th class="opsi">
                                    <h5 class="opsi"><?= $buku['kodebuku']; ?></h5><br>
                                </th>
                                <th class="opsi">
                                    <h5 class="opsi"><?= $buku['penulis']; ?></h5><br>
                                </th>
                                <th class="opsi">
                                    <h5 class="opsi"><?= $buku['penerbit']; ?></h5><br>
                                </th>


                            </div>


                        </tr>


                    <tbody>


                </div>


            </table>
        </div>

    </div>

</div>
<!-- /.card-body -->
<?= $this->endSection('content'); ?>