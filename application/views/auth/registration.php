
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                            </div>
                            <form method="post" action="<?= base_url('auth/registration/'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="uname" name="uname"
                                        placeholder="Username" value="<?= set_value('uname'); ?>">
                                    <?= form_error('uname', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                        
                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                        placeholder="Nomor Telepon" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>