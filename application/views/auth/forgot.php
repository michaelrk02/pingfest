<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/auth.min.css'); ?>" />

    <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card o-hidden my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <p class="title"> Lupa Password</p><br>
                            </div>
                            <?php if( !empty($this->session->userdata('forgot_msg')) ){
                                echo $this->session->userdata('forgot_msg');
                                $this->session->unset_userdata('forgot_msg');
                            } ?>
                            <form method="post" action="<?= site_url('auth/forgot/') ?>">
                                <div class="form-group">
                                    <label>Masukkan email yang terhubung dengan akun anda</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="email" name="email" placeholder="Masukkan email" >
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Lanjut
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= site_url('auth/index'); ?>">Kembali ke halaman Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

