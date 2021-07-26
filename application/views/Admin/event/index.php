  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Event</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Event</a></li> 
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
                      <th>Event</th>
                      <th>Price</th>
                      <th>Tersedia</th>
                      <th>Ditutup</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($events as $event): ?>
                    <tr> 
                      <td>
                        <?php echo $event->name ?>
                      </td>
                      <td>
                       <?php echo $event->price ?>
                      </td>
                      <td>
                       <?php 
                         if($event->available == 1){
                            echo "Ya";
                         }else{
                            echo "Tidak";
                         } 
                       ?>
                      </td>
                      <td>
                       <?php 
                         if($event->locked == 1){
                            echo "Ya";
                         }else{
                            echo "Tidak";
                         } 
                       ?>
                      </td> 
                      <td width="250">
                         <a href="<?php echo site_url() ?>/admin/event/edit/<?php echo $event->event_id ?>" class="btn btn-primary">Edit</a>
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
 
