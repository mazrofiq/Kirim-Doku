<?php
$agentKey = "A41418";
$requestId = guidv4();

$plaintext = $agentKey . $requestId;
$key ="627054fevj1sutvs";
$cipher = "aes-128-ecb";
$ciphertext ='';
if (in_array($cipher, openssl_get_cipher_methods())){
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key);
    }

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$requestBody = array (
    'agentKey' => $agentKey,
    'requestId' => $requestId,
    'signature' => $ciphertext
);
// var_export(json_encode($requestBody));die;

$ch = curl_init('https://staging.doku.com/apikirimdoku/ping');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    
    $responseJson = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    var_dump($responseJson);
    // return $responseJson;
?>