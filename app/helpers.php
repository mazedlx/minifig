<?php

if (!function_exists('set_active')) {
	/**
	 * Set active page
	 * @param  mixed $uri
	 * @return mixed
	 */
	function set_active($uri)
	{
		return Request::is($uri.'*') ? 'active' : '';
	}
}
