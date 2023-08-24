<?php
	namespace Doku\Common;
	use Doku\Common\Utils;
	use Doku\Common\Config;
	require_once ('Doku/Common/Utils.php');
	require_once ('Doku/Common/Config.php');
	class Generator
	{
		public static function signature($config){
			return Utils::generateSignature($config);
		}
		public static function post($config, $params){
			// var_dump($config);die;

			$getUrl = Config::getUrl($config);
			$url = $getUrl.$config['pathUrl'];
			$header = array(
	            'Content-Type: application/json'
	        );
			
			if ($config['pathUrl'] == '/cashin/remit' OR $config['pathUrl'] == '/cashin/inquiry' OR $config['pathUrl'] == '/transaction/info' OR $config['pathUrl'] == '/corporate/rate'){
				
				array_push($header,
	                'requestId: '.$config['request_id'],
			        'agentKey: '.$config['igent_id'],
			        'signature: '.$config['signature']
	            );
			}

			$ch = curl_init($url);
			if ($config['pathUrl'] != '/corporate/rate'){
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
			}
		    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		    
		    $responseJson = curl_exec($ch);
		    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		    curl_close($ch);

		    // var_dump($responseJson);
		    return $responseJson;
		}
		
	}
?>