<link rel="stylesheet" href="<?php echo base_url('public/pingfest/css/auth.min.css'); ?>" />

    <div class="container">

<div class="card o-hidden my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center align-middle alert alert-<?= $msg_type; ?>" role="alert">
                        <h1 class="bree h4 text-gray-900 "><?= $msg_content; ?></h1>
                    </div>
                    <?php if( $isAddingLink ): ?>
                        <div class="text-center">
                            <a class="small" href="<?= $msg_link; ?>"><?= $msg_link_content; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>