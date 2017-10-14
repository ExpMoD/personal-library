<?php 
function getProtocol(){
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$protocol = 'https://';
	} else {
		$protocol = 'http://';
	}
	return $protocol;
}
?>