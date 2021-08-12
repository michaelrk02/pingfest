  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Acara</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Daftar Peserta</a></li>
              <li class="breadcrumb-item"><a href="#">Semua Acara</a></li>
              <li class="breadcrumb-item active">Detail Acara</li>
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
            </div> 
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                     <div class="col-sm-2">
                      <label>Username</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $users->user_id ?>" disabled>
                    </div>
                  </div> 
                </div>
                <div class="col-sm-6">
                  <div class="row">
                     <div class="col-sm-2">
                      <label>Nama</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $users->name ?>" disabled>
                    </div>
                  </div> 
                </div> 
              </div> 
              <div>
                <br>
              </div>
              <div class="row"> 
                <div class="col-sm-6">
                 <div class="row">
                     <div class="col-sm-2">
                      <label>Email</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $users->email ?>" disabled>
                    </div>
                  </div> 
                </div>
                <div class="col-sm-6">
                  <div class="row">
                     <div class="col-sm-2">
                      <label>Phone</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $users->phone ?>" disabled>
                    </div>
                  </div> 
                </div>                
              </div>
              <div>
                <br>
              </div>
              <ul class="nav nav-tabs" role="tablist"> 
               <?php if(isset($bettle)){ ?> 
                  <li class="nav-item">
                    <a class="nav-link <?php if(isset($bettle)){ ?>  active <?php } ?>" href="#bettle" role="tab" data-toggle="tab">Bettle Of Technology</a>
                  </li> 
                <?php } ?>
                <?php if(isset($music)){ ?> 
                  <li class="nav-item">
                    <a class="nav-link <?php if(!isset($bettle) && isset($music)){ ?>  active <?php } ?>" href="#music" role="tab" data-toggle="tab">IT-Music</a>
                  </li>  
                <?php } ?>
                <?php if(isset($paper)){ ?> 
                  <li class="nav-item">
                    <a class="nav-link  <?php if(!isset($bettle) && !isset($music) && isset($paper)){ ?>  active <?php } ?>" href="#peper" role="tab" data-toggle="tab">IT-Peper</a>
                  </li>
                <?php } ?>
                <?php if(isset($semnas)){ ?> 
                  <li class="nav-item">
                    <a class="nav-link <?php if(!isset($bettle) && !isset($music) && !isset($paper) && isset($semnas)){ ?>  active <?php } ?>" href="#semnas" role="tab" data-toggle="tab">Semnas</a>
                  </li> 
                <?php } ?>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane <?php if(isset($bettle)){ ?>  active <?php } ?>" id="bettle">
                  <br>
                 <?php if(isset($bettle)){ ?> 
                  <div class="row">
                      <div class="form-group col-sm-6">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php echo $bettle->user_id ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6"> 
                        <label>Nama Ketua</label>
                        <input type="text" class="form-control" value="<?php echo $bettle->leader ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Nama Tim</label>
                        <input type="text" class="form-control" value="<?php echo $bettle->team_name ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Asal Sekolah</label>
                        <input type="text" class="form-control" value="<?php echo $bettle->school ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="<?php echo $bettle->phone ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>ID Card</label>
                        <div> 
                          <button class="btn btn-default">Liat</button>
                        </div>
                      </div>
                      <div class="form-group col-sm-6">
                        <label>Daftar Anggota</label> 
                          <ul> 
                            <li><input type="text" class="form-control" value="<?php echo $bettle->member_1 ?>" disabled></li>
                            <li><input type="text" class="form-control" value="<?php echo $bettle->member_2 ?>" disabled></li>
                          </ul>  
                      </div> 
                  </div>
                 <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane <?php if(!isset($bettle) && isset($music)){ ?>  active <?php } ?> " id="music">
                  <br>
                  <?php if(isset($music)){ ?> 
                  <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php echo $music->user_id ?>" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Nama Ketua</label>
                        <input type="text" class="form-control" value="<?php echo $music->leader ?>" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Nama Tim</label>
                        <input type="text" class="form-control" value="<?php echo $music->group_name ?>" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="<?php echo $music->phone ?>" disabled>
                    </div> 
                    <div class="form-group col-sm-6">
                        <label>Daftar Anggota</label>
                        <ul>
                          <?php $data = json_decode($music->members, TRUE)['data'] ?> 
                          <?php for ($i=0;$i<count($data);$i++): ?>
                          <li><input type="text" class="form-control" value="<?php echo $data[$i]; ?>" disabled></li> 
                          <?php endfor; ?>
                        </ul>  
                    </div>
                    <div class="form-group col-sm-6">
                      <div class="row"> 
                          <div class="form-group col-sm-4">
                            <label>ID Card</label>
                            <div>
                              <a href="#" class="btn btn-primary">Lihat</a> 
                            </div>
                          </div>
                          <div class="form-group col-sm-4">
                            <label>Hasil Karya</label>
                            <div>
                                <a href="<?php echo $music->link_gdrive ?>" class="btn btn-primary">Lihat</a>
                            </div>
                          </div>  
                          <div class="form-group col-sm-4">
                            <label>IGTV</label>
                            <div>
                                <a href="<?php echo $music->link_igtv ?>" class="btn btn-primary">Liat</a> 
                            </div>
                          </div>   
                      </div>
                    </div>
                  </div>
                 <?php } ?> 
                </div>
                <div role="tabpanel" class="tab-pane <?php if(!isset($bettle) && !isset($music) && isset($paper)){ ?>  active <?php } ?>" id="peper">
                  <br>
                  <?php if(isset($paper)){ ?> 
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label>Username</label>
                          <input type="text" class="form-control" value="<?php echo $paper->user_id ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Nama Ketua</label>
                          <input type="text" class="form-control" value="<?php echo $paper->leader ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Phone</label>
                          <input type="text" class="form-control" value="<?php echo $paper->phone ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Institution</label>
                          <input type="text" class="form-control" value="<?php echo $paper->institution ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Judul</label>
                          <input type="text" class="form-control" value="<?php echo $paper->title ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Lihat Hasil</label>
                          <div>
                            <a href="#" class="btn btn-primary">Liat File</a>  
                          </div>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Abstract</label>
                          <textarea class="form-control" rows="5" disabled><?php echo $paper->abstract ?></textarea>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Daftar Anggota</label>
                          <ul>
                            <?php $data = json_decode($paper->members, TRUE)['data'] ?> 
                            <?php for ($i=0;$i<count($data);$i++): ?>
                            <li><input type="text" class="form-control" value="<?php echo $data[$i]; ?>" disabled></li> 
                            <?php endfor; ?>
                          </ul> 
                      </div>
                    </div>
                 <?php } ?> 
                </div>
                <div role="tabpanel" class="tab-pane <?php if(!isset($bettle) && !isset($music) && !isset($paper) && isset($semnas)){ ?>  active <?php } ?>" id="semnas">
                  <?php if(isset($semnas)){ ?>  
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label>Username</label>
                          <input type="text" class="form-control" value="<?php echo $semnas->user_id ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Nama</label>
                          <input type="text" class="form-control" value="<?php echo $semnas->name ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Email</label>
                          <input type="text" class="form-control" value="<?php echo $semnas->email ?>" disabled>
                      </div>
                      <div class="form-group col-sm-6">
                          <label>Institusi</label>
                          <input type="text" class="form-control" value="<?php echo $semnas->institution ?>" disabled>
                      </div> 
                    </div>
                  <?php } ?> 
                </div>
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
 