<?php
defined('BASEPATH') OR exit;

function rupiah($amount) {
    return 'Rp. '.number_format($amount, 2, ',', '.');
}

