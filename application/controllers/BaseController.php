<?php
class BaseController extends Zend_Controller_Action {

	public function init() {
	}

	public function getBaseUrl() {
		return Zend_Controller_Front::getInstance()->getBaseUrl();
	}

	public function getPathSite() {
		$config = Zend_Registry::get('config');
		return $config->app->config->pathUrl;
	}

}