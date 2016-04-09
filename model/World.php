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
include_once( 'lib/Stor.php');


use \Tuanduimao\Tab as Tab;
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Stor as Stor;


class WorldModel extends Tab {

	/**
	 * 测试数据表模块
	 * @param array $param [description]
	 */
	function __construct( $param=[] ) {

		if ( !isset($param['_company_id'])) {
			$param['_company_id'] = 0;
		}

		$name = "com_{$param['_company_id']}";
		parent::__construct('world', $name);
	}



	/**
	 * 格式化数据
	 * @param  [type] $row [description]
	 * @return [type]      [description]
	 */
	function format( & $row ) {
		if ( isset($row['worldimg_path']) ) {
			$stor = new Stor;
			$row['worldimg_url'] = $stor->getUrl($row['worldimg_path']);
		}
	}


	/**
	 * 数据表结构
	 * @return [type] [description]
	 */
	function __schema() {
		// 数据结构
		try {

			$this->putColumn('wordid', $this->type('BaseString', ['screen_name'=>'世界ID','required'=>1, 'unique'=>1]) );
			$this->putColumn('name', $this->type('BaseString', ['screen_name'=>'世界名称','required'=>1]) );
			$this->putColumn('worldimg_path', $this->type('BaseString', ['screen_name'=>'地图图片']) );
			$this->putColumn('nick', $this->type('BaseString', ['screen_name'=>'世界昵称']) );
			$this->putColumn('desp', $this->type('BaseString', ['screen_name'=>'世界简介']) );

		} catch( Exception $e ) {
			Excp::elog($e);
			throw $e;
		}
	}

	/**
	 * 生成一个唯一的ID
	 * @return [type] [description]
	 */
	function genWorldid() {
		return (string) $this->nextid();
	}



	/**
	 * 重载数据入库逻辑 （自动创建 userid)
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function create( $data ) {
		if( !isset($data['wordid']) && !isset($data['_id']) ) {
			$data['wordid'] = $this->genWorldid();
		}
		return parent::create( $data );
	}

}