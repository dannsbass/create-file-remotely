<?php
/**
 * nama script: git_client.php (pasangannya: git_server.php)
 * script sederhana untuk mengirim request ke server
 * request mengandung dua parameter:
 * parameter 1: 'filename' (nama file)
 * parameter 2: 'script' (isi file)
 * jika dua parameter tersebut terpenuhi, server akan membuat file baru bernama $filename berisi $script
 * contoh penggunaan: php git_client.php dokumen.txt
 */

 # tentukan lokasi git_server.php
const MYURL = 'https://your.domain/git_server.php';

# penuhi 2 parameter yang dibutuhkan
$arg1 = 'filename';
$arg2 = 'script';

# script ini hanya berjalan di mode CLI
if (PHP_SAPI != 'cli') exit("this script only run in CLI mode\n");

# jika parameter 1 tidak ada, misal user hanya mengetik perintah: php git_client.php
if (!isset($argv[1])) exit("need 1 arg (file name)\n");

# jadikan parameter 1 sebagai nama file
$filename = $argv[1];

# jika tidak ditemukan file yang namanya dijadikan sebagai parameter
if (!file_exists($filename)) exit("file not found\n");

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => MYURL,
    CURLOPT_POSTFIELDS => [$arg1 => $filename, $arg2 => file_get_contents($filename)],
    CURLOPT_RETURNTRANSFER => true,
]);
$result = curl_exec($ch);
curl_close($ch);
return $result;
