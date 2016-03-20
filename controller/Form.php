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


class FormController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}

	function hello(){
	 	$data = ['hello'=>'HELLOV', 'world'=>'WORLDV'];
	 	App::render($data, 'form/web','hello');

	 	return [
	 		'js' => [
	 			"js/plugins/jquery-validation/jquery.validate.min.js"
	 		],
			'crumb' => [
                "应用示例" => APP::R('form','hello'),
                "创建表单" => ""
            ]
        ];
	}


	function datalist(){
		
		$world = App::M('World');
		$resp = $world->select();
		$data = ['worlds'=>$resp['data'], 'total'=>$resp['total']];


	 	App::render($data, 'form/web','datalist');
	 	return [
			'crumb' => [
                "应用示例" => APP::R('form','hello'),
                "数据列表" => ""
            ]
        ];
	}



	function hellolist() {

		$data = [ 
			"logs"=>[
				['id'=>1,'name'=>'张三', 'action'=>'修改布局', 'at'=>'2015-12-31'],
				['id'=>2,'name'=>'李四', 'action'=>'修改布局', 'at'=>'2016-1-16'],
				['id'=>3,'name'=>'王五', 'action'=>'修改布局', 'at'=>'2016-3-18'],
			]
		];

		App::render($data, 'form/web','list');
	}
}