<?php
	namespace Doku\Service;
	use Doku\Common\Generator;
	require_once('Doku/Common/Generator.php');
	class ApiGenerated
	{
		public static function signature($config){
			return Generator::signature($config);
		}
		public static function ping($config, $params, $api){
			// var_dump($config);die;
			$api == 'ping'?$config['pathUrl'] = '/ping':$config['pathUrl'] = '/checkbalance';

			// var_dump($config);die;
			return Generator::post($config, $params);
		}

		public static function checkRate($config){
			// var_dump($config);die;
			$config['pathUrl'] = '/corporate/rate';
			return Generator::post($config, null);
		}

		public static function Inquiry($config, $params){
			// var_dump($config);die;
			$config['pathUrl'] = '/cashin/inquiry';
			return Generator::post($config, $params);
		}
		public static function Remit($config, $params){
			// var_dump($config);die;
			$config['pathUrl'] = '/cashin/remit';
			return Generator::post($config, $params);
		}
		public static function transactionInfo($config, $params){
			// var_dump($config);die;
			$config['pathUrl'] = '/transaction/info';
			return Generator::post($config, $params);
		}
	}
?>