<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>


<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-square" src="dist/img/Vv2.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">ARIF RAHMAN</h3>

                <p class="text-muted text-center">MAHASISWA</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="float-right">2,333</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="float-right">200</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">19,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                    SMTIK PALANGKARAYA
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">PALANGKARAYA, KALIMANTAN TENGAH, INDONESIA</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    <span class="tag tag-danger">Mengerjakan Tugas Tepat Waktu</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Rapi</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>




<?= $this->endSection('content'); ?>