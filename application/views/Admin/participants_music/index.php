  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">IT-Music</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Daftar Peserta</a></li>
              <li class="breadcrumb-item active">IT-Music</li>
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
              <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Nama grup</th>
                      <th>Judul Lagu</th> 
                      <th>Daftar anggota</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($musics as $music): ?>
                    <tr>
                      <td width="150">
                        <?php echo $music->name ?>
                      </td>
                      <td>
                        <?php echo $music->group_name ?>
                      </td>
                      <td>
                       <?php echo $music->song_name ?>
                      </td> 
                      <td class="small">
                        <ul>
                          <li><?php echo $music->leader ?></li>
                          <li><?php echo $music->member_1 ?></li>
                          <li><?php echo $music->member_2 ?></li>
                        </ul> 
                      </td>
                      <td width="250">
                        <!-- <a href="<?php echo site_url('admin/products/edit/'.$product->product_id) ?>"
                         class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                        <a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$product->product_id) ?>')"
                         href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
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
 