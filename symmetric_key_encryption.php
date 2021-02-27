<?php

// Encryption with a static key
// (in a real use case, do NOT check it in with your code!)

$message = "This message is very secret";

$key = base64_decode("G67PUiRRVTEM0rBkm1x4zdvbr2ANfnPfEULNnNyrAs8=");
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

$ciphertext = sodium_crypto_secretbox($message, $nonce, $key);

$ciphertextBase64 = base64_encode($ciphertext);
$nonceBase64 = base64_encode($nonce);

// send $ciphertextBase64 and $nonceBase64 to your receiver
// They can decrypt it using their copy of the key:

$plaintext2 = sodium_crypto_secretbox_open(
    base64_decode($ciphertextBase64), base64_decode($nonceBase64), $key);

echo $plaintext2;
