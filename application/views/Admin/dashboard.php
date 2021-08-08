

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $countBettle ?></h3>

                <p>Battle</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_battle') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
          <!-- ./col -->
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countMusic ?></h3>

                <p>Music</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_music') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $countPaper ?></h3>

                <p>Paper</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_paper') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $countSemnas ?></h3>

                <p>Semnas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_semnas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                 <h3><?php echo $countParticipant ?></h3>  
                <p>Semua</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_all') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


        <div class="row">

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h5><?php echo  "Rp. ". number_format( $sumBettle->invoice,0) ?></h5>

                <p>Battle</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_battle') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
          <!-- ./col -->
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5><?php echo "Rp. ". number_format($sumMusic->invoice,0) ?></h5>

                <p>Music</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_music') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h5><?php echo "Rp. ". number_format($sumPaper->invoice,0) ?></h5>

                <p>Paper</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_paper') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5><?php echo  "Rp. ". number_format($sumSemnas->invoice,0) ?></h5>

                <p>Semnas</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_semnas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                 <h5><?php echo "Rp. ". number_format($sumSemua->invoice,0) ?></h5>  
                <p>Semua</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_all') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


        <div class="row">

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $countAkun ?></h3>

                <p>User Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/users') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6">
          <!-- ./col -->
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countBelumParticipant ?></h3>

                <p>Belum Dikonfirmasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('admin/participants_all') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 