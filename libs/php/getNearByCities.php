<?php

	$url='http://api.geonames.org/citiesJSON?north=' . $_REQUEST['north'] . '&south=' . $_REQUEST['south'] . '&east='. $_REQUEST['east'] . '&west=' . $_REQUEST['west'] . '&lang=en&maxRows=20&username=***';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);

	$result=curl_exec($ch);
	$err = curl_error($ch);
	curl_close($ch);	
	
	header('Content-Type: application/json; charset=UTF-8');
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$decode = json_decode($result, true);
		$output['data'] = $decode['geonames'];
		echo json_encode($output); 
	}  

?>