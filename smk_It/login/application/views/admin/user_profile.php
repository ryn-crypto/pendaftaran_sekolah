    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>

        <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img size="200" class="rounded mx-auto d-block" src="<?= base_url('assets/img/profile/') . $show['image']?>">
            </div>
            <div class="col-md-8">
                <div class="card-body mx-auto">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">No.Reg</th>
                            <td>: <span class="card-text mb-3"> <?= $show['id']; ?></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>: <span class="card-title"><?= $show['name']; ?></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>: <span class="card-text"><?= $show['email']; ?></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Test Score</th>
                            <td>: Score not available</td>
                        </tr>
                    </tbody>
                    </table>                                
                    <p class="card-text"><small class="text-muted">Member since, <?= date('d F Y', $show['date_create']); ?></small></p>
                </div>
            </div>
        </div>
        </div>

        <a href="<?= base_url('admin'); ?>"><button class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"> Back</i></button></a>
        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->