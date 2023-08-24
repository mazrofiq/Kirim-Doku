<?php
	namespace Doku;
	use Doku\Service\ApiGenerated;
	require_once('Doku/Service/ApiGenerated.php');
	/**
	 * 
	 */
	class Aigent{
		private $config = array();
		private $config2 = array();
		public function setAigent($igentId)
	    {
	        $this->config['igent_id'] = $igentId;
	    }

	    public function setEncryptionKey($key)
	    {
	        $this->config['encryption_key'] = $key;
	    }
	    public function setEnvironment($key)
	    {
	        $this->config['environment'] = $key;
	    }
	    public function contentDetails($contentDetail){
	    	 $this->config2['signature'] = $contentDetail['signature'];
	    	 $this->config2['request_id'] = $contentDetail['request_id'];
	    }

	    public function getConfig()
	    {
	    	$this->config2['igent_id'] = $this->config['igent_id'];
	    	$this->config2['environment'] = $this->config['environment'];
	        return $this->config2;
	    }

	    public function signature()
	    {
	    	// $this->config = $this->getConfig();
	        // return ApiGenerated::signature($this->config);
	        return ApiGenerated::signature($this->config);
	    }
	    public function generatePing($params, $api)
	    {
	    	// var_dump($this->config);die;
	        return ApiGenerated::ping($this->config, $params, $api);
	    }
	    public function generateCheckRate()
	    {
	    	$this->config2 = $this->getConfig();
	        return ApiGenerated::checkRate($this->config2);
	    }
	    public function generateInquiry($params)
	    {
	    	$this->config2 = $this->getConfig();
	        return ApiGenerated::Inquiry($this->config2, $params);
	    }
	    public function generateRemit($params)
	    {
	    	$this->config2 = $this->getConfig();
	        return ApiGenerated::Remit($this->config2, $params);
	    }
	    public function generateTransactionInfo($params)
	    {
	    	$this->config2 = $this->getConfig();
	        return ApiGenerated::transactionInfo($this->config2, $params);
	    }
	}
?>