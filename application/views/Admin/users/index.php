  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">User</a></li> 
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
            </div>
            <div class="clearfix"></div>

             <?php if ($this->session->flashdata('msg')) {?>

                  <span class="alert alert-success col-sm-12"><?php echo $this->session->flashdata('msg');?></span>

              <?php }?>

            <div class="clearfix"></div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Phone</th>  
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr> 
                      <td>
                        <?php echo $user->user_id ?>
                      </td>
                      <td>
                       <?php echo $user->name ?>
                      </td>  
                      <td>
                       <?php echo $user->email ?>
                      </td>  
                      <td>
                       <?php echo $user->phone ?>
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
 
