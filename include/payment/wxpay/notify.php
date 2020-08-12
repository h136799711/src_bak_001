<?php

define('IN_MYMPS', true);
define('IN_ADMIN', true);
define('CURSCRIPT', 'notify');
require_once dirname(__FILE__) . '/../../../include/global.php';
require_once MYMPS_DATA . '/config.php';
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
include MYMPS_INC . '/pay.fun.php';
$payr = $db->getRow('SELECT * FROM ' . $db_mymps . 'payapi WHERE paytype=\'wxpay\'');
$payr['paykey'] = trim($payr['paykey']);
require_once 'function.php';
$data = file_get_contents('php://input');
$xml_parser = xml_parser_create();

if (!(xml_parse($xml_parser, $data, true))) {
	exit();
}

xml_parser_free($xml_parser);
$xml = simplexml_load_string($data);
$param = array();

foreach ($xml as $key => $val ) {
	if ($key != 'sign') {
		$param[$key] = $val;
	}
}

ksort($param);
$strArr = array();

foreach ($param as $key => $val ) {
	array_push($strArr, $key . '=' . $val);
}

$string = implode('&', $strArr);
$sign = $string . '&key=' . $payr['paykey'];
$sign = strtoupper(md5($sign));

if ($sign == $xml->sign) {
	$out_trade_no = $xml->out_trade_no;
	$transaction_id = $xml->transaction_id;
	$total_fee = intval($xml->total_fee) / 100;
	$paybz = '支付成功';
	$paybz = ($charset == 'gbk' ? iconv('utf-8', 'gbk', $paybz) : $paybz);
	UpdatePayRecord($out_trade_no, $paybz);
	WechatReturnSuccess();
}

?>
