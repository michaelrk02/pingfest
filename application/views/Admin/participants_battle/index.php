  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bettle of Technology</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Daftar Peserta</a></li>
              <li class="breadcrumb-item active">Bettle of Technology</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <!-- DataTables -->
          <div class="card">
            <div class="card-header">
              <!-- <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a> -->
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Nama ketua</th>
                      <th>Nama tim</th>
                      <th>Asal sekolah</th>
                      <th>Phone</th>
                      <th>Daftar anggota</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($bettles as $bettle): ?>
                    <tr>
                      <td width="150">
                        <?php echo $bettle->user_id ?>
                      </td>
                      <td>
                        <?php echo $bettle->leader ?>
                      </td>
                      <td>
                        <?php echo $bettle->team_name ?>
                      </td>
                      <td>
                       <?php echo $bettle->school ?>
                      </td>
                      <td>
                       <?php echo $bettle->phone ?>
                      </td>
                      <td class="small">
                        <ul> 
                          <li><?php echo $bettle->member_1 ?></li>
                          <li><?php echo $bettle->member_2 ?></li>
                        </ul> 
                      </td>
                      <td width="250">
                        <a href="<?php echo site_url() ?>/admin/participants_battle/id_card/<?php echo $bettle->user_id ?>" class="btn btn-primary">ID Card</a> 
                      </td>
                    </tr>
                    <?php endforeach; ?> 

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- DataTables -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
