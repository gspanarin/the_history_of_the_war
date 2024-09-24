<?php

namespace common\components\helpers;

/**
 * Description of UrlManager
 *
 * @author Panarin
 */
class UrlManager {
	
	
	static function Url( $base_url, $get_params = null ) {
		$get = $_GET;
		$get_params_str = [];
		foreach ($get_params as $key => $value)
			$get[$key] = $value;
		foreach ($get as $key => $value)
			if ($value != '' && $value != null)
				$get_params_str[] = $key . '=' . $value;
			
		return $base_url . ($get_params_str != null ? '?' . implode('&', $get_params_str) : '');
	}
}
