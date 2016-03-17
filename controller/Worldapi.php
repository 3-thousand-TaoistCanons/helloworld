<?php
require_once('loader/Controller.php');
require_once('loader/App.php');
require_once('lib/Utils.php');
require_once('lib/Tuan.php');

use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


class WorldapiController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}

	function get(){

		echo json_encode(['query'=>$this->query,  'data'=>$this->data, 'user'=>$this->user]);
	}
}