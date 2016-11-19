<?php

use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


class SetupController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}

	function install() {
		echo json_encode('ok');
	}

	function upgrade(){
		echo json_encode('ok');	
	}

	function repair() {
		echo json_encode('ok');		
	}

	function uninstall() {
		echo json_encode('ok');		
	}

	function menulist() {

		echo '{
			"docs/menutest4":{
				"name":"动态添加",
				"link":"{defaults,index,[test:61]}",
				"target":"",
				"order":102,
				"permission":"boss,admin,user,manager"
			},
			"docs/menutest5":{
				"name":"动态添加A",
				"link":"{defaults,index,[test:62]}",
				"target":"",
				"order":2,
				"permission":"boss,admin,user,manager"
			}
		}';
	}
	
}