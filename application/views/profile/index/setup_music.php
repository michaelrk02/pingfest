<script src="<?php echo base_url('public/marked/js/marked.min.js'); ?>"></script>
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
                <div class="alert alert-danger"><span class="fa fa-exclamation-circle"></span> Pengisian data sudah ditutup</div>
            </div>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-success"><span class="fa fa-exclamation-circle"></span> Pengisian data masih dibuka</div>
            </div>
        <?php endif; ?>
        <div class="col-12" style="padding-bottom: 3rem">
            <form action="<?php echo site_url('profile/setup_music'); ?>" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="form-group">
                    <label>Nama Grup <span class="text-danger">*</span></label>
                    <input <?php echo $locked ? 'readonly' : '' ?> type="text" class="form-control" name="group_name" placeholder="Nama Grup" value="<?php echo htmlspecialchars($identity['group_name']); ?>">
                </div>
                <div class="form-group">
                    <label>Nama Ketua <span class="text-danger">*</span></label>
                    <input <?php echo $locked ? 'readonly' : '' ?> type="text" class="form-control" name="leader" placeholder="Nama Ketua" value="<?php echo htmlspecialchars($identity['leader']); ?>">
                </div>
                <div class="form-group">
                    <label>No. Telp. Ketua <span class="text-danger">*</span></label>
                    <input <?php echo $locked ? 'readonly' : '' ?> type="text" class="form-control" name="phone" placeholder="No. Telp. Ketua" value="<?php echo htmlspecialchars($identity['phone']); ?>">
                </div>
                <div class="form-group">
                    <label>Jumlah Anggota (Selain Ketua)</label>
                    <select <?php echo $locked ? 'readonly' : '' ?> class="form-control" id="members-count">
                        <?php for ($i = 0; $i <= 6; $i++): ?>
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
                    <label>Link Karya (Google Drive) <span class="text-danger">*</span></label>
                    <input <?php echo $locked ? 'readonly' : '' ?> type="text" class="form-control" name="link_gdrive" placeholder="Link Karya (Google Drive)" value="<?php echo htmlspecialchars($identity['link_gdrive']); ?>">
                </div>
                <div class="form-group">
                    <label>Link Karya (IGTV) <span class="text-danger">*</span></label>
                    <input <?php echo $locked ? 'readonly' : '' ?> type="text" class="form-control" name="link_igtv" placeholder="Link Karya (IGTV)" value="<?php echo htmlspecialchars($identity['link_igtv']); ?>">
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
        <?php if ($locked): ?>
            input.attr('readonly', 'readonly');
        <?php endif; ?>
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
    $('#announcements').html(function(index, announcements) {
        return marked(announcements);
    });
});

</script>
