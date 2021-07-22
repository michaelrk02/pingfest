

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <?php if( !empty($this->session->userdata('auth_msg')) ){
                                        echo $this->session->userdata('auth_msg');
                                        $this->session->unset_userdata('auth_msg');
                                    } ?>
                                    <form method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="uname" name="uname" placeholder="Username" 
                                                value="<?= set_value('uname'); ?>">
                                            <?= form_error('uname', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password"
                                                value="<?= set_value('password'); ?>">
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forget/'); ?>">Lupa password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/registration/'); ?>">Belum punya akun?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

