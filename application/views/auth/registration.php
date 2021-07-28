
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
                            <form method="post" action="<?= site_url('auth/registration/'); ?>">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-user" id="uname" name="uname"
                                        placeholder="Masukkan username" value="<?= set_value('uname'); ?>">
                                    <?= form_error('uname', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Masukkan nama lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Masukkan alamat email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Masukkan password">
                                        <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><span style="opacity:0;">Invisible</span> </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
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
                                <a class="small" href="<?= site_url('auth'); ?>">Sudah punya akun?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>