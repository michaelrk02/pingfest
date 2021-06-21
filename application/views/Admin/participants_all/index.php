  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Semua Acara</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Daftar Peserta</a></li>
              <li class="breadcrumb-item active">Semua Acara</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
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
                      <th>Timestamp</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Jenis Acara</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($participants as $participant): ?>
                    <tr>
                      <td width="150">
                        <?php echo $participant->user_id ?>
                      </td>
                      <td>
                        <?php echo $participant->timestamp ?>
                      </td>
                      <td>
                        <?php echo $participant->name_user ?>
                      </td>
                      <td>
                       <?php echo $participant->email ?>
                      </td>
                      <td>
                       <?php echo $participant->phone ?>
                      </td>
                      <td>
                       <?php echo $participant->name_event ?>
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 