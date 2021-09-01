<div class="container pb-4">
    <div class="row my-2">
        <div class="col-12 py-2">
            <div class="alert alert-warning">
                <b>PERHATIAN.</b> Pengisian identitas dilakukan setelah pembayaran diterima. Harap cek masing-masing guidebook lomba
                jika ingin mengetahui identitas apa saja yang dibutuhkan pada tiap lomba IT-Venture. Guidebook untuk
                tiap lomba IT-Venture dapat diakses <a target="_blank" href="<?php echo site_url('itv'); ?>">di sini</a>.
            </div>
        </div>
        <?php foreach ($events as $event): ?>
            <div class="col-12 col-md-6 py-2">
                <div id="invoice-<?php echo md5($event['event_id']); ?>" class="card bg-light border border-dark">
                    <div class="card-body">
                        <div class="text-center"><h5><?php echo htmlspecialchars($event['name']); ?></h5></div>
                        <div class="row" style="margin-top: 2rem; margin-bottom: 2rem">
                            <?php if (empty($registration[$event['event_id']])): ?>
                                <div class="col-auto ml-auto mr-auto"><a onclick="return confirm('<?php echo $event['price'] == 0 ? 'Apakah anda yakin?' : 'Apakah anda yakin? Jika iya, anda akan langsung menerima tagihan pembayaran. Untuk pengisian form identitas akan dilakukan setelah pembayaran terkonfirmasi. Pembayaran dapat dilakukan dalam jangka waktu normal 1x24 jam mulai dari sekarang'; ?>')" class="btn btn-info btn-lg border border-dark <?php echo empty($event['available']) ? 'disabled' : ''; ?>" href="<?php echo site_url('profile/register').'?event='.urlencode($event['event_id']); ?>">DAFTARKAN SEKARANG</a></div>
                            <?php else: ?>
                                <div class="col-12 my-2">
                                    <?php if ($registration[$event['event_id']]['status'] == 1): ?>
                                        <ul class="list-group mb-2">
                                            <li class="list-group-item bg-primary text-white"><h5>Status Peserta</h5></li>
                                            <li class="list-group-item">Selamat! Anda telah menjadi bagian dari <b><?php echo htmlspecialchars($event['name']); ?></b>. Silakan lengkapi identitas keikutsertaan anda dengan mengklik link di bawah ini sebelum terkunci</li>
                                            <li class="list-group-item"><a href="<?php echo site_url('profile/index').'?tab='.urlencode($registration[$event['event_id']]['tab']); ?>"><?php echo $registration[$event['event_id']]['setup'] ? 'Ke halaman identitas' : 'Lengkapi identitas'; ?> &raquo;</a></li>
                                            <li class="list-group-item">Jika ada pertanyaan terkait acara ini, silakan hubungi CP terkait</li>
                                        </ul>
                                    <?php endif; ?>
                                    <ul class="list-group">
                                        <li class="list-group-item bg-info"><h5>Invoice</h5></li>
                                        <li class="list-group-item"><b>Status Pembayaran:</b> <?php echo !empty($registration[$event['event_id']]['status']) ? '<span class="badge badge-success">LUNAS</span>' : '<span class="badge badge-danger">BELUM LUNAS</span>'; ?></li>
                                        <li class="list-group-item"><b>Waktu Pemesanan:</b> <span class="inv-timestamp"><?php echo $registration[$event['event_id']]['timestamp']; ?></span></li>
                                        <li class="list-group-item"><b>Tagihan:</b> <?php echo rupiah($registration[$event['event_id']]['invoice']); ?></li>
                                        <li class="list-group-item"><b>Kode Unik:</b> <?php echo $registration[$event['event_id']]['unique']; ?></li>
                                        <li class="list-group-item"><b>Tagihan Total:</b> <?php echo rupiah($registration[$event['event_id']]['total']); ?></li>
                                        <?php if ($registration[$event['event_id']]['status'] == 0): ?>
                                            <li class="list-group-item">Perhatikan nominal pada tagihan total, anda harus membayar <b>lengkap hingga penambahan kode uniknya</b></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if ($registration[$event['event_id']]['status'] == 0): ?>
                                    <div class="col-12 my-2">
                                        <ul class="list-group">
                                            <li class="list-group-item bg-secondary text-white"><h5>Pembayaran</h5></li>
                                            <li class="list-group-item">Segera lakukan pembayaran ke rekening tujuan sesuai dengan informasi di bawah. Setelah melakukan pembayaran, anda dapat langsung mengisi identitas anda untuk acara ini.</li>
                                            <li class="list-group-item">
                                                <b>Status Tagihan:</b>
                                                <?php if (time() < $registration[$event['event_id']]['expired']): ?>
                                                    <span class="badge badge-success">BERLAKU</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">KADALUARSA</span>
                                                    <a class="text-danger" href="<?php echo site_url('profile/reset').'?event='.urlencode($event['event_id']); ?>" onclick="return confirm('Apakah anda yakin?')"><span class="fa fa-trash"></span> Hapus Tagihan</a>
                                                <?php endif; ?>
                                            </li>
                                            <li class="list-group-item"><b>Rekening Tujuan:</b> <?php echo $bank_account; ?></li>
                                            <li class="list-group-item"><b>Nominal Pembayaran:</b> <?php echo rupiah($registration[$event['event_id']]['total']); ?></li>
                                            <li class="list-group-item"><b>Deadline Transfer:</b> <span class="inv-expired"><?php echo $registration[$event['event_id']]['expired']; ?></span></li>
                                            <li class="list-group-item">Anda memiliki waktu <b class="inv-timeleft" data-timeleft="<?php echo max(0, $registration[$event['event_id']]['expired'] - time()); ?>"></b> tersisa untuk melakukan pembayaran. Tagihan akan kadaluarsa ketika sudah melewati batas dan anda dapat melakukan pemesanan lagi</li>
                                            <li class="list-group-item">
                                                <?php if (time() < $registration[$event['event_id']]['expired']): ?>
                                                    Apabila sudah melakukan pembayaran, silakan tunggu beberapa saat (umumnya setelah tagihan kadaluarsa) selagi kami memproses pembayaran anda.
                                                <?php else: ?>
                                                    Tagihan sudah kadaluarsa. Jika anda sudah melakukan pembayaran, silakan tunggu beberapa saat selagi kami memproses pembayaran anda. Namun jika anda belum melakukan pembayaran, anda dapat menghapus tagihan ini dan membuat tagihan baru</a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mb-2">
                            <?php if (!empty($event['available'])): ?>
                                <span class="badge badge-success">PENDAFTARAN DIBUKA</span>
                            <?php else: ?>
                                <span class="badge badge-danger">PENDAFTARAN DITUTUP</span>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mt-2">Harga: <b><?php echo !empty($event['price']) ? rupiah($event['price']) : 'GRATIS'; ?></b></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
function duration(t) {
    hours = Math.floor(t / 3600);
    mins = Math.floor(t / 60) % 60;
    secs = Math.floor(t) % 60;

    return hours + ' jam ' + mins + ' menit ' + secs + ' detik';
}

$(document).ready(function() {
    $('.inv-timestamp').text(function(i, timestamp) {
        return (new Date(parseInt(timestamp) * 1000)).toString();
    });
    $('.inv-expired').text(function(i, expired) {
        return (new Date(parseInt(expired) * 1000)).toString();
    });
    $('.inv-timeleft').each(function(i, e) {
        $(e).text(duration(parseInt($(e).attr('data-timeleft'))));
        setInterval(function() {
            var timeleft = parseInt($(e).attr('data-timeleft'));
            if (timeleft > 0) {
                timeleft--;
                $(e).attr('data-timeleft', timeleft);
            }

            $(e).text(duration(timeleft));
        }, 1000);
    });
});
</script>
