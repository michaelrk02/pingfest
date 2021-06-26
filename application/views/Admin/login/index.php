<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dist/css/login.css">
</head>
<body class="main-bg">
    <form action="<?php echo site_url('admin/login/aksi_login'); ?>" method="post">
        <div class="login-container text-c animated flipInX">
            <div>
                <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            </div>
                <h3 class="text-whitesmoke">Pingfest 2021</h3>
                <p class="text-whitesmoke">Sign In</p>
            <div class="container-content">
                <form class="margin-t">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="*****" required="">
                    </div>
                    <button type="submit" class="form-button button-l margin-b">Sign In</button>

                    <!-- <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>  -->
                </form>
                <p class="margin-t text-whitesmoke"><small> Pingfest &copy; 2021</small> </p>
            </div>
        </div>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>