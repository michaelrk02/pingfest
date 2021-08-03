<div class="container pt-4">
    <div class="row my-2">
        <?php if (!empty($status)): ?>
            <div class="col-12">
                <div class="alert alert-<?php echo substr($status, 0, 8) === 'SUCCESS:' ? 'success' : 'danger'; ?>">
                    <span><?php echo htmlspecialchars($status); ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
