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
            <form action="<?php echo site_url('profile/setup_paper'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="form-group">
                    <label>Asal Institusi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="institution" placeholder="Asal Institusi" value="<?php echo htmlspecialchars($identity['institution']); ?>">
                </div>
                <div class="form-group">
                    <label>Nama Ketua <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="leader" placeholder="Nama Ketua" value="<?php echo htmlspecialchars($identity['leader']); ?>">
                </div>
                <div class="form-group">
                    <label>No. Telp. Ketua <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="No. Telp. Ketua" value="<?php echo htmlspecialchars($identity['phone']); ?>">
                </div>
                <div class="form-group">
                    <label>Jumlah Anggota (Selain Ketua)</label>
                    <select class="form-control" id="members-count">
                        <?php for ($i = 0; $i <= 2; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo $i == count($identity['members']) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <ul class="list-group" id="members-list">
                        <li class="list-group-item">Daftar Anggota</li>
                        <?php foreach ($identity['members'] as $i => $member): ?>
                            <li class="list-group-item member-desc"><input type="text" class="form-control" name="members[]" placeholder="Anggota #<?php echo $i + 1; ?>" value="<?php echo htmlspecialchars($member); ?>"></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="form-group">
                    <label>Judul Karya Tulis <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" placeholder="Judul Karya Tulis" value="<?php echo htmlspecialchars($identity['title']); ?>">
                </div>
                <div class="form-group">
                    <label>Abstrak <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="abstract" placeholder="Abstrak" rows="5"><?php echo htmlspecialchars($identity['abstract']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Kartu Tanda Mahasiswa (PDF) <span class="text-danger">*</span></label>
                    <div>
                        <span><b>Status:</b> <?php echo !empty($idcard_url) ? '<span class="badge badge-success">SUDAH DIUNGGAH</span>' : '<span class="badge badge-danger">BELUM DIUNGGAH</span>'; ?></span>
                        <?php if (!empty($idcard_url)): ?>
                            <span>- <a href="<?php echo $idcard_url; ?>">Unduh</a></span>
                        <?php endif; ?>
                    </div>
                    <input type="file" class="form-control-file" name="idcard" accept="application/pdf">
                    <small class="form-text text-muted">Unggah 1 file PDF yang berisi <b>kumpulan foto kartu tanda mahasiswa</b> dari semua anggota tim (maks <b>15MB</b>)</small>
                </div>
                <div class="form-group">
                    <label>File Submisi (PDF) <span class="text-danger">*</span></label>
                    <div>
                        <span><b>Status:</b> <?php echo !empty($submission_url) ? '<span class="badge badge-success">SUDAH DIUNGGAH</span>' : '<span class="badge badge-danger">BELUM DIUNGGAH</span>'; ?></span>
                        <?php if (!empty($submission_url)): ?>
                            <span>- <a href="<?php echo $submission_url; ?>">.pdf">Unduh</a></span>
                        <?php endif; ?>
                    </div>
                    <input type="file" class="form-control-file" name="submission" accept="application/pdf">
                    <small class="form-text text-muted">Unggah file karya tulis berupa PDF (maks <b>20MB</b>)</small>
                </div>
                <div class="form-group">
                    <button <?php echo $locked ? 'disabled' : '' ?> type="submit" class="btn btn-success" name="submit" value="1"><span class="fa fa-sync mr-2"></span> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

function changeMembersCount(count) {
    var membersList = $('#members-list');
    var oldMembers = [];
    var newMembers = [];
    var i;

    membersList.find('.member-desc').each(function(i, e) {
        oldMembers.push($(e).find('input').val());
    });

    for (i = 0; i < Math.min(count, oldMembers.length); i++) {
        newMembers.push(oldMembers[i]);
    }

    membersList.find('.member-desc').remove();
    for (i = 0; i < count; i++) {
        var li = $(document.createElement('li'));
        li.addClass(['list-group-item', 'member-desc']);

        var input = $(document.createElement('input'));
        input.attr('type', 'text');
        input.addClass('form-control');
        input.attr('name', 'members[]');
        input.attr('placeholder', 'Anggota #' + (i + 1));
        input.val(newMembers[i]);
        input.appendTo(li);

        li.appendTo(membersList);
    }
}

$(document).ready(function() {
    changeMembersCount($('#members-count').val());
    $('#members-count').on('input', function(e) {
        changeMembersCount($(e.target).val());
    });
});

</script>
