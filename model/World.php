<?php
/**
 * 部门模型
 *
 * CLASS 
 * 		\Tuanduimao\Tab
 * 		      |
 * 	        World
 *
 * USEAGE:
 *
 */

include_once( 'lib/Tab.php');
include_once( 'lib/Mem.php');
include_once( 'lib/Excp.php');
include_once( 'lib/Err.php');
include_once( 'lib/Conf.php');


use \Tuanduimao\Tab as Tab;
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;


class WorldModel extends Tab {

	/**
	 * 测试数据表模块
	 * @param integer $company_id [description]
	 */
	function __construct( $company_id = 0 ) {

		$name = "com_{$company_id}";
		parent::__construct('world', $name);
	}



	/**
	 * 数据表结构
	 * @return [type] [description]
	 */
	function __schema() {
		// 数据结构
		try {

			$this->putColumn('name', $this->type('BaseString', ['screen_name'=>'部门名称','required'=>1]) );
			$this->putColumn('nick', $this->type('BaseString', ['screen_name'=>'部门名称']) );

		} catch( Exception $e ) {
			Excp::elog($e);
			throw $e;
		}
	}

}