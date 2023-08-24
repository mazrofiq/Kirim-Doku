<?php
	namespace Doku\Common;
	class Config{
		const SANBOX_URL = 'https://staging.doku.com/apikirimdoku';
		const PRODUCTION_URL = 'https://kirimdoku.com/v2/api';
		public static function getUrl ($state){
			// var_dump($state);die;
			// echo $state['environment']; die;
			return $state['environment'] == 'false'? Config::PRODUCTION_URL:Config::SANBOX_URL;
		}
	}
?>