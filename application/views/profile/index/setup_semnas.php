<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning">
                <h5>Pengumuman</h5>
                <hr>
                <div id="announcements"><?php echo htmlspecialchars($announcements); ?></div>
            </div>
        </div>
        <div class="col-12" style="padding-bottom: 3rem">
            <form action="<?php echo site_url('profile/setup_semnas'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="form-group">
                    <label>Asal Institusi</label>
                    <input type="text" class="form-control" name="institution" placeholder="Asal Institusi" value="<?php echo htmlspecialchars($identity['institution']); ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="submit" value="1">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
