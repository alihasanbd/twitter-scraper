<?php

require_once(__DIR__ .'/../vendor/autoload.php');

spl_autoload_register(function ($class){
	$class = str_replace('Kodeio\TwitterScraper\\', '', $class);
	$file = __DIR__ .'/../src/'. $class .'.php';
	if(file_exists($file)){
		require_once($file);
	}
});

function dd($var){
	echo '<pre>';
	print_r($var);
	exit();
}
