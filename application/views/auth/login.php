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
                                        <p class="title">Login</p>
                                    </div>
                                    <?php if( !empty($this->session->userdata('auth_msg')) ){
                                        echo $this->session->userdata('auth_msg');
                                        $this->session->unset_userdata('auth_msg');
                                    } ?>
                                    <?php if (isset($sso)): ?>
                                        <p>Anda sedang menggunakan Single-Sign-On (SSO) untuk melanjutkan ke aplikasi <b><?php echo htmlspecialchars($sso['app_name']); ?></b></p>
                                    <?php endif; ?>
                                    <form method="post" action="<?= site_url('auth').$form_url_param; ?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="uname" name="uname" placeholder="Masukkan username anda" 
                                                value="<?= set_value('uname'); ?>">
                                            <?= form_error('uname', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Masukkan password anda"
                                                value="<?= set_value('password'); ?>">
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox1">
                                            <label class="custom-control-label" for="checkbox1">Tampilkan password</label>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= site_url('auth/forgot/'); ?>">Lupa password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= site_url('auth/registration/'); ?>">Belum punya akun?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<script>
    $(document).ready(function() {
        $('#checkbox1').click(function() {
            if( $(this).is(':checked') ){
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        })

        $('#checkbox2').click(function() {
            if( $(this).is(':checked') ){
                $('#password').attr('type', 'text');
                $('#password2').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
                $('#password2').attr('type', 'password');
            }
        })
    })
</script>

