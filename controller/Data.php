<?php

use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;


class DataController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}

	function hellodelete(){
		$world = App::M('World');
		$list = $world->select();
		if (!is_array($list['data'])) {

			$e = new Excp( '系统错误,请联系管理员。', '500');
				$e->log();
				echo $e->error->toJSON(); 
			return;
		}

		$result = true;
		$errors = [];
		foreach ($list['data'] as $row) {
			$_id = $row['_id'];
			if ( $world->delete($_id) === false ) {
				$result = false;
				$errors[] = $row['name'] . '删除失败';
			}
		}

		echo json_encode(['result'=>$result, 'errors'=>$errors]);
	}


	function hellosave() {

		$world = App::M('World');
		$resp = $world->create($_POST);
		if ( $resp === false ) {
			$extra = [];
			$errors = (is_array($dept->errors)) ? $dept->errors : [];

			foreach ($errors as $cname=>$error ) {
				$error = (is_array($error)) ? end($error) : [];
				$field = (isset($error['field'])) ? $error['field'] : 'error';
				$message = (isset($error['message'])) ? $error['message'] : '系统错误,请联系管理员。';
				$extra[] = ['_FIELD'=>$field,'message'=>$message];
			}

			$e = new Excp( '系统错误,请联系管理员。', '500', $extra);
				$e->log();
				echo $e->error->toJSON(); 

			return ;
		}
		
		echo json_encode($resp);
	}

}