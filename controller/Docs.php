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


class DocsController extends \Tuanduimao\Loader\Controller {
	
	function __construct() {
	}

	function service() {
		$tuan = new Tuan;
		$resp = $tuan->call('/apps/helloworld/world/list',['q1'=>'q1v'],['d1'=>'d1v']);
		
		echo "<pre>";
		print_r($resp);
		echo "</pre>";
	}


	function dev() {
		echo "<pre>";
		echo "dev". "\n";
		echo "SESSION_ID: " . session_id() . "\n";
		$_SESSION["user/session/id"] = "HELLO";
		print_r($_SESSION);

	}

	function api() {

		$tuan = new Tuan;
		// $token = $tuan->getAccessToken();
		$resp = $tuan->call('/apps/helloworld/world/get',['q1'=>'q1v'],['d1'=>'d1v']);
		echo "<pre>";
		echo "SESSION_ID: " . session_id() . "\n";
		print_r($_SESSION);

		// echo $token . "\n";
		// echo Conf::G('general/appid') . "\n";
		print_r($resp);
		echo "</pre>";

		return [
			'crumb' => [
                "应用示例" => APP::R('docs','api'),
                "API文档" => ""
            ]
        ];

	}

	function ui() {

		$ut = new Utils;
		$ip = $ut->getClientIP();

		echo "<pre>";
		echo "用户IP: $ip\n";
		echo "STATIC: ". APP::SR('/document.md')."\n";
		echo "PORTAL: ". APP::PR('docs','test',['maa'=>'boys'])."\n";
		echo "NOFRAME: ". APP::NR('docs','test',['maa'=>'boys'])."\n";
		echo "TEST" . APP::NRUN('docs','test',['maa'=>'mm']);

		echo "</pre>";

		 return [
        	'js' => [
                'js/plugins/jquery-validation/jquery.validate.min.js',
        		'js/plugins/select2/select2.full.min.js',
        		'js/plugins/bootstrap-select/bootstrap-select.js',
        		'js/plugins/jquery-tags-input/jquery.tagsinput.min.js',
                'js/plugins/jquery-tags-input/jquery.tagsinput2.js',
        		'js/plugins/jquery-ui/jquery-ui.min.js',
                //  APP_HOME_STATIC. '/static/js/plugins/jquery.supertable.js',
        	],

        	'css'=> [
        		'js/plugins/select2/select2.min.css',
        		'js/plugins/bootstrap-select/bootstrap-select.min.css',
        		'js/plugins/jquery-tags-input/jquery.tagsinput.min.css',
        	],

            'crumb' => [
                "应用示例" => APP::R('docs','ui'),
                "界面文档" => "",
            ]
        ];
	}
	


	function test(){
		echo "<pre>";
		print_r( $this );
		echo "</pre>";
	}
}