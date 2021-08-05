
<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/auth.min.css'); ?>" />

<div class="container">
    <h1>Pengaturan</h1>
    <div class="row mt-4">
        <div class="col-12" style="padding-bottom: 3rem">
            <form action="<?php echo site_url('profile/settings'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="form-group">
                    <label>User ID <span class="text-danger">*</span></label>
                    <input readonly type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($user['name']); ?>">
                </div>
                <div class="form-group">
                    <label>E-mail <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>
                <div class="form-group">
                    <label>No. Telepon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="No. Telepon" value="<?php echo htmlspecialchars($user['phone']); ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="(tidak diubah)">
                </div>
                <div class="form-group">
                    <label>Ulangi password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="(tidak diubah)">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="1"><span class="fa fa-save mr-2"></span> Simpan</button>
                    <a class="text-danger mr-2" href="<?php echo site_url('profile/index'); ?>"><span class="fa fa-arrow-circle-left"></span> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
