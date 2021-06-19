<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?= $this->session->flashdata('message'); ?>

<!-- List Data User -->
<h2>List User</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Score</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $nomor = 1;
        foreach($table as $list) : ?>
            <tr>
                <th scope="row"><?= $nomor; $nomor++ ?></th>
                <td><?= $list->name ?></td>
                <td><?= $list->email ?></td>
                <td><?= $list->score ?></td>
                <td>
                <?php 
                    if($list->role_id == 1) {
                        echo("Administrator");
                    } else {
                        echo("User");
                    }
                ?>
                </td>
                <td>
                    <div class="dropdown d-inline">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url()?>/admin/manage/<?=$list->id; ?>">
                        <?php 
                        if($list->role_id == 1) {
                            echo("to User");
                        } else {
                            echo("to Admin");
                        }
                        ?>
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>/admin/freeze/<?=$list->id; ?>">
                        <?php 
                        if($list->is_active == 1) {
                            echo("Freeze");
                        } else {
                            echo("Activate");
                        }
                        ?>
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>/admin/profile/<?=$list->id; ?>">Show Profile</a>
                    </div>
                    </div>
                    </a>
                    <a class="btn btn-danger" href="<?= base_url()?>/admin/delete/<?=$list->id; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->