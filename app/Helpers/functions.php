<?php

// 語系
if (!function_exists('L')) {
	function L($message, $method = null) {
		
		if ($method === null) {
			$method = "app";
		}
		
		$message = $method . "." . $message;
		
		return trans($message);
	}
}