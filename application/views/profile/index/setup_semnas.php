<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">
                <h5>Pengumuman</h5>
                <hr>
                <div id="announcements"><?php echo htmlspecialchars($announcements); ?></div>
            </div>
        </div>
        <?php if ($locked): ?>
            <div class="col-12">
                <div class="alert alert-danger">Pengisian data sudah ditutup</div>
            </div>
        <?php endif; ?>
        <div class="col-12" style="padding-bottom: 3rem">
            <form action="<?php echo site_url('profile/setup_semnas'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="form-group">
                    <label>Asal Institusi</label>
                    <input type="text" class="form-control" name="institution" placeholder="Asal Institusi" value="<?php echo htmlspecialchars($identity['institution']); ?>">
                </div>
                <div class="form-group">
                    <button <?php echo $locked ? 'disabled' : '' ?> type="submit" class="btn btn-success" name="submit" value="1"><span class="fa fa-sync mr-2"></span> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
