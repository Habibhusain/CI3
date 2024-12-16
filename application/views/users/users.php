<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $title;?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar User</li>
        </ol>
        <?php echo $this->session->flashdata('action_status');?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user mr-1"></i>
                Daftar User
                <a href="<?php echo site_url();?>/users/users_tambah" class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>Tambah User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><a href=""><u><?php echo $row->username;?></u></a></td>
                                <td><?php echo $row->first_name.' '.$row->last_name;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->level_users;?></td>
                                <td><?php echo $row->active;?></td>
                                <td>
                                    <a href="<?php echo site_url();?>/users/users_edit/<?php echo $row->id;?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                    &nbsp;
                                    <a href="<?php echo site_url();?>/users/users_delete/<?php echo $row->id;?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin Menghapus data ini??')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>