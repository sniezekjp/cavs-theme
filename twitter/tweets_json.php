<?php
require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth

$session = new WC_Session_Handler(); 
if( isset($session->tweets) && !isset($_GET['reset']) ){
    echo $session->tweets; 
    exit; 
}

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

$connection = new tmhOAuth(array(
  'consumer_key' => 'BuX9vgDwrS7kvoFY4vpahQ',
	'consumer_secret' => 'PY007HErkkv5h3OCEcTb5Up136iJ0SUGnyfXroHqZrY',
	'user_token' => '2308848446-PAEOj85ZfVxmS0kuucXmEWMJhqZ81t4KN81guzY', //access token
	'user_secret' => 'DzwA3Jy63RUZQnajZiuPAcfsRzRbDaUYDtfA1IG0cfmti' //access token secret
));

// set up parameters to pass
$parameters = array();
$parameters['count'] = 5; 
$parameters['screen_name'] = 'novacavaliers';
$twitter_path = '1.1/statuses/user_timeline.json';

$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if everything's good
	$response = strip_tags($connection->response['response']);

	if ($_GET['callback']) { // if we ask for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {	    
	    $session->tweets = $response; 
		echo $response;	
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}

// You may have to download and copy http://curl.haxx.se/ca/cacert.pem