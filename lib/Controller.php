<?php

abstract class Controller {
	protected $route_params = [];

	function __construct($route_params) {
		$this->route_params = $route_params;
	}
}
