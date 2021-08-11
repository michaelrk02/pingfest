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
              <!-- <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a> -->
            </div>

            <div class="clearfix"></div>

             <?php if ($this->session->flashdata('msg')) {?>

                  <span class="alert alert-success col-sm-12"><?php echo $this->session->flashdata('msg');?></span>

              <?php }?>

            <div class="clearfix"></div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%">
                  <thead>
                    <tr>
                      <th>Jenis Acara</th>
                      <th>Status</th>
                      <th>Username</th>
                      <th>Timestamp</th>
                      <th>Invoice</th> 
                      <th>Expired</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($participants as $participant): ?>
                    <tr>
                      <td>
                       <?php echo $participant->name_event ?>
                      </td> 
                      <td>
                        <?php 
                          if($participant->status == 0){
                           echo "belum";
                          }else{
                            echo "sudah";
                          }
                         ?> 
                      </td> 
                      <td>
                        <?php echo $participant->user_id ?>
                      </td>
                      <td>
                        <?php echo date("Y-m-d H:i:s", $participant->timestamp) ?>
                      </td>
                      <td>
                        <?php echo "Rp. ".number_format($participant->total,0) ?>
                      </td> 
                      <td>
                        <?php
                          if($participant->expired == 1){ 
                            echo "Sudah";
                          }else{
                            echo "Belum"; 
                          } 
                        ?>
                      </td>
                      <td width="250">
                        <?php 
                          if($participant->status == 0){
                        ?> 
                          <table>
                            <tr>
                              <td>
                                 <form action="<?php echo site_url('admin/participants_all/accept_payment'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                                    <input type="hidden" name="user_id" value="<?php echo $participant->user_id ?>">
                                    <input type="hidden" name="event_id"value="<?php echo $participant->event_id ?>">
                                    <input type="hidden" name="timestamp" value="<?php echo strtotime(date("Y-m-d H:i:s")) ?>">
                                    <input type="hidden" name="invoice" value="<?php echo $participant->invoice ?>">
                                    <input type="hidden" name="unique" value="<?php echo $participant->unique ?>">
                                    <input type="hidden" name="total" value="<?php echo $participant->total ?>"> 
                                    <input type="hidden" name="status" value="1">
                                   <input type="submit" name="terima" value="sudah" class="btn btn-success">
                                 </form> 
                              </td>
                              <td>
                                 <form action="<?php echo site_url('admin/participants_all/decline_payment'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                                   <input type="hidden" name="user_id" value="<?php echo $participant->user_id ?>">
                                    <input type="hidden" name="event_id"value="<?php echo $participant->event_id ?>">
                                    <input type="hidden" name="timestamp" value="<?php echo strtotime(date("Y-m-d H:i:s")) ?>">
                                    <input type="hidden" name="invoice" value="<?php echo $participant->invoice ?>">
                                    <input type="hidden" name="unique" value="<?php echo $participant->unique ?>">
                                    <input type="hidden" name="total" value="<?php echo $participant->total ?>"> 
                                    <input type="hidden" name="status" value="0">
                                 <input type="submit" name="tolak" value="tolak" class="btn btn-danger">
                               </form>
                              </td>
                              <td> 
                                <a href="<?php echo site_url() ?>/admin/participants_all/show/<?php echo $participant->user_id ?>" class="btn btn-primary">Detail</a>
                              </td>
                            </tr>
                          </table>
                        <?php
                          }else{
                        ?> 
                          <!-- <a href="#" class="btn btn-default">Detail</a> -->
                           <a href="<?php echo site_url() ?>/admin/participants_all/show/<?php echo $participant->user_id ?>" class="btn btn-primary">Detail</a>
                        <?php
                          }
                        ?> 
                      </td>
                    </tr>
                    <?php endforeach; ?> 

                  </tbody>
                  <tfoot>
                    
                  </tfoot>
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
 
