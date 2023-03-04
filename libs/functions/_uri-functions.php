<?php  

function getModuleName( $for_admin = '' ) {
	$uri = $_SERVER['REQUEST_URI'];
	$uriArray = explode('?', $uri);
	$uri = $uriArray[0];
	$uri = rtrim($uri, "/");
	$uri = substr($uri, 1);
	$uri = filter_var($uri, FILTER_SANITIZE_URL);
	$moduleNameArr = explode('/', $uri);
	if ( $for_admin == 'for_admin' ) {
		$uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : $moduleNameArr[0];
	} else {
		$uriModule = $moduleNameArr[0];
	}
	return $uriModule;
}

function getUriGet(){
	$uri = $_SERVER['REQUEST_URI'];
	$uri = rtrim($uri, "/");
	$uri = filter_var($uri, FILTER_SANITIZE_URL);
	$uri = substr($uri, 1);
	$uri = explode('?', $uri);
	$uri = $uri[0];
	$uriArr = explode('/', $uri);
	$uriGet = isset($uriArr[1]) ? $uriArr[1] : null ;
	return $uriGet;
}

function getUriGetCat(){
	$uri = $_SERVER['REQUEST_URI'];
	$uri = rtrim($uri, "/");
	$uri = filter_var($uri, FILTER_SANITIZE_URL);
	$uri = substr($uri, 1);
	$uri = explode('?', $uri);
	$uri = $uri[0];
	$uriArr = explode('/', $uri);
	$uriGetCat = isset($uriArr[2]) ? $uriArr[2] : null ;
	return $uriGetCat;
}

?>