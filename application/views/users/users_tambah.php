<main>
    <div class="container-fluid">
        <h1 class="mt-4">Form Tambah User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Tambah User</li>
        </ol>
        <div class="card mb-4 ">
            <div class="card-body ">

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>');?>

                <form action="<?php echo site_url();?>/users/users_tambah" method="post" enctype="multipart/form-data">
                <input type="hidden" name="active" value="1" >
                       <!-- INPUT Text Username -->
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="inputUsername" value="<?php echo set_value('username')?>" autofocus>
                    </div>

                    <!-- INPUT Text First Name -->
                    <div class="form-group">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name')?>" id="inputFirstName">
                    </div>

                    <!-- INPUT Text Last Name -->
                    <div class="form-group">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="inputLastName">
                    </div>

                    <!-- INPUT Email -->
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email')?>" id="inputEmail">
                    </div>

                    <!-- INPUT Password -->
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword">
                    </div>

                     <!-- INPUT Number-->
                     <div class="form-group">
                        <label for="exampleInputNama1">Phone</label>
                          <input type="number" class="form-control" name="phone" id="exampleInputNama1" aria-describedby="namaHelp">
                      </div>

                      <!-- INPUT Select-->
                      <div class="form-group">
                        <label>Level Pengguna</label>
                        <select class="custom-select" id="inputGroupSelect01" name="level_users">
                          <option value="pengguna">Pengguna</option>
                          <option value="admin">admin</option>
                        </select>
                      </div>

                        <div class="card-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                          <a href="<?php echo site_url();?>/users" class="btn btn-link float-right"><i class="fas fa-arrow-left"></i>Kembali</a>
                        </div>
                  </form>
            </div>
        </div>
    </div>
</main>