<html>
    <head>
    </head>
    <body>
        <h2>Pembayaran Ditolak</h2>
        <div><b>Waktu:</b> <?php echo date('r'); ?></div>
        <div><b>User ID:</b> <?php echo htmlspecialchars($user_id); ?></div>
        <div><b>Event:</b> <?php echo htmlspecialchars($event_name); ?></div>
        <div><b>Invoice:</b> <?php echo rupiah($invoice); ?></div>
        <p>
            Pembayaran anda ditolak oleh administrator kami.
            Hal ini dapat disebabkan oleh salah satu dari antara beberapa kemungkinan berikut:
            <ul>
                <li>Anda belum melakukan transfer</li>
                <li>Kesalahan pada nomor rekening tujuan</li>
                <li>Nominal yang dibayarkan tidak sesuai dengan yang tertera (termasuk 3 digit terakhir kode unik pembayaran)</li>
            </ul>
        </p>
        <p>Segera hubungi CP apabila terdapat kesalahan pada nominal pembayaran</p>
        <p>Anda dapat mengakses profil anda di <a href="<?php echo $profile_url; ?>"><?php echo $profile_url; ?></a> (harap login terlebih dahulu)</p>
    </body>
</html>
