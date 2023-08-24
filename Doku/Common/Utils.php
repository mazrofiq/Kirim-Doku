<?php
	namespace Doku\Common;
	class Utils{
		
		public static function generateSignature($config){
			// var_dump($config);die;
			$request_id = Utils::guidv4();
			$plaintext = $config['igent_id'] . $request_id;
			$key =$config['encryption_key'];
			$cipher = "aes-128-ecb";
			$ciphertext =null;
			if (in_array($cipher, openssl_get_cipher_methods())){
			    $ciphertext = openssl_encrypt($plaintext, $cipher, $key);
    			}
    		$params = array(
    			'signature' => $ciphertext,
    			'request_id' => $request_id
    		);
    		return $params;
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
	}

?>