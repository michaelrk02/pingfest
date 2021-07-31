
    <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
                    </div>
                    <?php if( !empty($this->session->userdata('forgothandle_msg')) ){
                        echo $this->session->userdata('forgothandle_msg');
                        $this->session->unset_userdata('forgothandle_msg');
                    } ?>
                    <form method="post" action="<?= site_url('auth/forgot_handle') . $url_param; ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control form-control-user" id="uname" name="uname"
                                placeholder="<?= $id ?>" value="<?= $id ?>" readonly>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Masukkan password baru</label>
                                <input type="password" class="form-control form-control-user"
                                    id="password" name="password" placeholder="Masukkan password baru">
                                <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <label><span style="opacity:0;">Invisible</span> </label>
                                <input type="password" class="form-control form-control-user"
                                    id="password2" name="password2" placeholder="Ulangi password baru">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Ubah
                        </button>
                    </form>
                    <hr>           
                </div>
            </div>
        </div>
    </div>
</div>

</div>