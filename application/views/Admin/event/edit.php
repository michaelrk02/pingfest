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
                <form action="<?php echo site_url() ?>/admin/event/update/<?php echo $data->event_id ?>" method="post">
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Nama</label>
                      <input type="hidden" class="form-control" name="event_id" value="<?php if(isset($data->event_id)){ echo $data->event_id; } ?>">
                      <input type="text" class="form-control" name="name" value="<?php if(isset($data->name)){ echo $data->name; } ?>">
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Harga</label>
                      <input type="text" class="form-control" name="price" value="<?php if(isset($data->price)){ echo $data->price; } ?>">
                    </div>
                    <div class="form-group col-sm-6">
                      <div>
                        <label>Tersedia</label>
                        <table width="100%">
                          <tr>
                            <td>
                              <input type="checkbox" class="form-control"  name="available" value="1" <?php if(isset($data->available)) if($data->available == 1) echo 'checked="checked"'; ?> > 
                            </td>
                            <td>
                              <label>Ya</label>
                            </td>
                          </tr>
                        </table> 
                      </div>
                      <div>
                        <label>Kunci</label>
                        <table  width="100%">
                          <tr>
                            <td>
                              <input type="checkbox" class="form-control"  name="locked" value="1" <?php if(isset($data->locked)) if($data->locked == 1) echo 'checked="checked"'; ?>> 
                            </td>
                            <td>
                              <label>Ya</label>
                            </td>
                          </tr>
                        </table> 
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Pengumuman</label>
                      <textarea class="form-control" name="announcements" rows="5"><?php if(isset($data->announcements)){ echo $data->announcements; } ?></textarea> 
                    </div>
                     <div class="form-group col-sm-6">
                      <button class="btn btn-primary">Simpan</button>
                      <a href="<?php echo site_url('admin/event') ?>" class="btn btn-default">Kembali</a>
                    </div>
                  </div> 
               </form> 
            </div>
          </div>
        <!-- DataTables -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
