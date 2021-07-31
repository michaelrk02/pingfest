<html>
    <head>
    </head>
    <body>
        <h2>Halo Sobat P!NG!</h2>
        <p>Anda telah meminta untuk melakukan <b>ubah password</b> akun P!NGFEST. Berikut link untuk mengubah password pada username terkait:</p>
        <ul>
        <?php foreach( $tokens as $user => $token ): ?>
            <li><span><?php echo $user; ?></span> : <a href="<?php echo site_url('auth/forgot_handle') . "?token=" . urlencode($token); ?>"><?php echo site_url('auth/forgot_handle') . "?token=" . urlencode($token); ?></a></li>
        <?php endforeach; ?>
        </ul>
        <p><b>PERINGATAN:</b> Link akan kadaluwarsa dalam 1 hari</p>
    </body>
</html>

