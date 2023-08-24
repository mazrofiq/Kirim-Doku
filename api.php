<?php
require_once('Doku/Aigent.php');
$DokuAigent = new Doku\Aigent;
$DokuAigent->setAigent($_POST['agentKey']);
$DokuAigent->setEncryptionKey($_POST['encryptionKey']);
$DokuAigent->setEnvironment($_POST['environment']);

$sz = $_POST['API'];

$genSignature = $DokuAigent->signature();
// var_dump($genSignature);die;
// echo "<hr>";
$cd = array(
	'signature' => $genSignature['signature'],
	'request_id' => $genSignature['request_id']
);
$DokuAigent->contentDetails($cd);


if($sz == 'ping' OR $sz == 'cb'){
	$requestBody = array (
		    'agentKey' => $_POST['agentKey'],
		    'requestId' => $genSignature['request_id'],
		    'signature' => $genSignature['signature']
		);
}

switch ($sz){
	case 'ping':
	$ping = $DokuAigent->generatePing($requestBody, $_POST['API']);
	var_dump($ping);
	break;
	case 'cb':
	$ping = $DokuAigent->generatePing($requestBody, $_POST['API']);
	var_dump($ping);
	break;
	case 'cr':
	$checkRate = $DokuAigent->generateCheckRate();
	// echo json_decode($checkRate)->{'message'};die;
	var_dump($checkRate);
	break;
	case 'inquiry':
	$bodyInquiry = array(
		'channel' => array(
			'code'=>'07'
		),
		'beneficiaryAccount'=>array(
			'bank'=>array(
				'code'=>'CENAIDJA',
				'countryCode'=>'ID',
				'id'=>'014',
				'name'=>'BANK BCA'
				),
			'city'=>'Jakarta',
			'name'=>'FHILEA HERMANUS',
			'number'=>'0803944123'
		),
		'beneficiaryCountry'=>array(
			'code'=>'ID'
		),
		'beneficiaryCurrency'=>array(
			'code'=>'IDR'
		),
		'senderCountry'=>array(
			'code'=>'ID'
		),
		'senderCurrency'=>array(
			'code'=>'IDR'
		),
		'senderAmount'=>10000
	);
	// echo $body['beneficiaryAccount']['bank']['code'];die;
	$inquiry = json_decode($DokuAigent->generateInquiry($bodyInquiry),1);
	// var_dump($inquiry);
	// $ada = json_decode($inquiry,1);
	// echo $inquiry['inquiry']['idToken'];die;

	// echo json_decode($inquiry)->{'message'};die;
	if(isset($inquiry['inquiry']['idToken'])){

		$bodyRemit = array(
		'channel' => array(
			'code'=>'07'
		),
		'inquiry' => array(
			'idToken'=>$inquiry['inquiry']['idToken']
		),
		'beneficiary'=>array(
			'country'=>array(
				'code'=>'ID'
				),
			'firstName'=>'FHILEA',
			'lastName'=>'HERMANUS',
			'phoneNumber'=>'628156056051'
		),
		'beneficiaryCity'=>'Jakarta',
		'beneficiaryCountry'=>array(
			'code'=>'ID'
		),
		'beneficiaryAccount'=>array(
			'bank'=>array(
				'id'=>'014',
				'code'=>'CENAIDJA',
				'name'=>'BANK BCA',
				'countryCode'=>'ID'
				),
			'city'=>'Jakarta',
			'name'=>'FHILEA HERMANUS',
			'number'=>'0803944123'
		),
		'beneficiaryCurrency'=>array(
			'code'=>'IDR'
		),
		'sender'=>array(
			'country'=>array(
				'code'=>'ID'
				),
			'firstName'=>'FHILEA',
			'lastName'=>'HERMANUS',
			'phoneNumber'=>'628156056051',
			'birthDate'=>'1900-01-01',
			'personalId'=>'01234567890',
			'personalIdType'=>'KTP',
			'personalIdCountry'=>array(
				'code'=>'ID'
			)
		),
		'senderCountry'=>array(
			'code'=>'ID'
		),
		'senderCurrency'=>array(
			'code'=>'IDR'
		),
		'senderAmount'=>10000,
		'sendTrxId'=>'remit'.date('YmdHis')
	);
		// var_dump($bodyRemit);die;
		$remit = $DokuAigent->generateRemit($bodyRemit);
		var_dump($remit);
	}else{
		// echo 'test'; die;
		var_dump($inquiry);
	}
	break;
	case 'ti':
		$bodyTi = array(
			'transactionId'=>'DK01057165'
		);
		$transactionInfo = $DokuAigent->generateTransactionInfo($bodyTi);
		var_dump($transactionInfo);
	break;
	default:
		echo "Anda belum memilih API";
}

?>