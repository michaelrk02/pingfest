<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/auth.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/profile.min.css'); ?>" />

<div class="container">
    <div class="row my-2">
        <div class="col-12" style="padding-bottom: 2rem">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-2 col-12 my-auto text-center">
                        <div class="display-1 fa fa-user mb-2"></div>
                        <div><a href="<?php echo site_url('profile/settings'); ?>"><span class="fa fa-cog mr-2"></span>Pengaturan</a></div>
                        <div><a class="text-danger" href="<?php echo site_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin?')"><span class="fa fa-sign-out-alt mr-2"></span>Logout</a></div>
                    </div>
                    <div class="col-md-10 col-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h3>Profil Anda</h3></li>
                            <li class="list-group-item"><b>User ID:</b> <span class="text-monospace"><?php echo $_SESSION['user_id']; ?></span></li>
                            <li class="list-group-item"><b>Nama Lengkap:</b> <?php echo htmlspecialchars($user['name']); ?></li>
                            <li class="list-group-item"><b>E-mail:</b> <?php echo htmlspecialchars($user['email']); ?></li>
                            <li class="list-group-item"><b>No. Telepon:</b> <?php echo htmlspecialchars($user['phone']); ?></li>
                            <li class="list-group-item">Anda dapat melihat Terms of Service dengan mengklik <a href="#TOSModal" data-toggle="modal" data-target="#TOSModal">di sini<a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" style="padding-bottom: 1rem">
            <ul class="nav nav-tabs">
                <?php foreach ($tabs as $tabitem): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $tab === $tabitem['id'] ? 'active' : ''; ?>" href="<?php echo site_url('profile/index').'?tab='.urlencode($tabitem['id']); ?>"><?php echo htmlspecialchars($tabitem['title']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
