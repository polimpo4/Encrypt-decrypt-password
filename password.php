<?php

$password = '123456789';
$encrypted ='';


function encryptPass($password) {
    $sSalt = '$2y$10$1qb2f.Xd9CVpaeozsH2CFeaXSTqxXgq/EHvtkNYoH.zyd7gsIEo7q';
    $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
    $method = 'aes-256-cbc';

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    $encrypted = base64_encode(openssl_encrypt($password, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
    
    echo $encrypted . '<br>';

    return $encrypted;
}
$encrypted = encryptPass($password);



function decryptPass($encrypted) {
    $sSalt = '$2y$10$1qb2f.Xd9CVpaeozsH2CFeaXSTqxXgq/EHvtkNYoH.zyd7gsIEo7q';
    $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
    $method = 'aes-256-cbc';

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $sSalt, OPENSSL_RAW_DATA, $iv);
    
    echo $decrypted . '<br>';
    
    return $decrypted;
}

decryptPass($encrypted);

//FUNCIONAL!!

?>
