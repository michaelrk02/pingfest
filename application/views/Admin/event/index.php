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
                         <form action="<?php echo site_url('admin/event/available'); ?>" method="post">
                            <input type="hidden" name="event_id" value="<?php echo $event->event_id ?>">
                            <input type="hidden" name="name"value="<?php echo $event->name ?>">
                            <input type="hidden" name="price" value="<?php echo $event->price ?>">
                            <?php if($event->available == 1){ ?> 
                              <input type="hidden" name="available" value="0"> 
                            <?php  }else{ ?>
                              <input type="hidden" name="available" value="1"> 
                            <?php } ?>
                            <input type="hidden" name="locked" value="<?php echo $event->locked ?>">
                            <?php if($event->available == 1){ ?> 
                              <input type="submit" name="submit" value="Tidak Tersedia" class="btn btn-danger">
                            <?php  }else{ ?>
                              <input type="submit" name="submit" value="Tersedia" class="btn btn-success">
                            <?php } ?>  
                         </form> 
                          <form action="<?php echo site_url('admin/event/locked'); ?>" method="post">
                            <input type="hidden" name="event_id" value="<?php echo $event->event_id ?>">
                            <input type="hidden" name="name"value="<?php echo $event->name ?>">
                            <input type="hidden" name="price" value="<?php echo $event->price ?>">
                            <?php if($event->locked == 1){ ?> 
                              <input type="hidden" name="locked" value="0"> 
                            <?php  }else{ ?>
                              <input type="hidden" name="locked" value="1"> 
                            <?php } ?>
                            <input type="hidden" name="available" value="<?php echo $event->available ?>">
                            <?php if($event->locked == 1){ ?> 
                              <input type="submit" name="submit" value="Dibuka" class="btn btn-success">
                            <?php  }else{ ?>
                              <input type="submit" name="submit" value="Ditutup" class="btn btn-danger">
                            <?php } ?>  
                         </form> 
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
 
