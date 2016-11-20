<?php
use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


class DefaultsController extends \Tuanduimao\Loader\Controller {

	function index() {
		echo "<pre>";
		Utils::out( $_REQUEST, "\n", Utils::getHeaders() );

		echo "</pre>";
	}
}
	