<?php
/**
 * 世界 REST API
 * 本程序由脚手架自动生成 @1459911776 
 *
 * /helloworld/controller/Worldapi.php
 *
 */
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

	
	/**
	 * 根据主键读取一条世界  
	 * @api  /apps/helloworld/world/get
	 *
	 * @query|@data $_id   
	 * @query|@data $wordid 世界ID  
     *
	 * @return Array World   
	 * 
	 * @package.json: 
	 * "register_api": {
	 * 		...
	 * 		"/world/get": {
	 *			"name":"读取世界",
	 *			"controller":"worldapi",
	 *			"action":"get",
	 *			"public":false
	 *		},
	 *  	...
	 *  }
     *
	 * @example:
	 *	$tuan = new Tuan;
	 *	$resp = $tuan->call('/apps/helloworld/world/get', ['_id'=>'value'] );
	 *	$resp = $tuan->call('/apps/helloworld/world/get', ['wordid'=>'value'] );
	 */
	function get() {
		
		$_id = (isset($this->data['_id'])) ? $this->data['_id'] : null;
		$_id = (!empty($_id) && isset($this->query['_id'])) ? $_id : $this->query['_id'];
		$wordid = (isset($this->data['wordid'])) ? $this->data['wordid'] : null;
		$wordid = (!empty($wordid) && isset($this->query['wordid'])) ? $wordid : $this->query['wordid'];
		
		if ( $_id === null && $wordid === null ) {
			throw new Excp("请输入 _id 或 wordid ", 500, [ 'data'=>$this->data,'query'=>$this->query]);
		}

		$data = null;
		
		if ( !empty($_id) && $data==null  ) {
			$data = App::M('World')->getLine("WHERE _id='$_id' LIMIT 1");
		}
		
		if ( !empty($wordid) && $data==null  ) {
			$data = App::M('World')->getLine("WHERE wordid='$wordid' LIMIT 1");
		}

		if ( $data  === null ) {
			throw new Excp("世界不存在", 404, [ 'data'=>$this->data,'query'=>$this->query]);
		}

		echo json_encode($data);
	}




    /**
	 * 创建世界  
	 * @api  /apps/helloworld/world/create
	 *
	 * @data 世界数据 
     *
	 * @return Array World   
	 * 
	 * @package.json: 
	 * "register_api": {
	 * 		...
	 * 		"/world/create": {
	 *			"name":"创建世界",
	 *			"controller":"worldapi",
	 *			"action":"create",
	 *			"public":false
	 *		},
	 *  	...
	 *  }
     *
	 * @example:
	 *	$tuan = new Tuan;
	 *	$resp = $tuan->call('/apps/helloworld/world/create', [], ['<key>'=>'<value>',...] );
	 */
	function create() {
		$World = App::M('World');
		$resp = $World->create($this->data);
		if ( $resp  === false ) {
			throw new Excp("创建世界失败", 500, ['errors'=>$World->errors, 'data'=>$this->data,'query'=>$this->query]);
		}

		echo json_encode($resp);
	}




	/**
	 * 根据主键删除一条世界  
	 * @api  /apps/helloworld/world/delete
	 *
	 * @query|@data $_id   
	 * @query|@data $wordid 世界ID  
     *
	 * @return Array World   
	 * 
	 * @package.json: 
	 * "register_api": {
	 * 		...
	 * 		"/world/delete": {
	 *			"name":"删除世界",
	 *			"controller":"worldapi",
	 *			"action":"delete",
	 *			"public":false
	 *		},
	 *  	...
	 *  }
     *
	 * @example:
	 *	$tuan = new Tuan;
	 *	$resp = $tuan->call('/apps/helloworld/world/delete', ['_id'=>'value'] );
	 *	$resp = $tuan->call('/apps/helloworld/world/delete', ['wordid'=>'value'] );
	 */
	function delete() {

		$World = App::M('World');
		$_id = (isset($this->data['_id'])) ? $this->data['_id'] : null;
		$_id = (!empty($_id) && isset($this->query['_id'])) ? $_id : $this->query['_id'];
		$wordid = (isset($this->data['wordid'])) ? $this->data['wordid'] : null;
		$wordid = (!empty($wordid) && isset($this->query['wordid'])) ? $wordid : $this->query['wordid'];
		
		if ( $_id === null && $wordid === null ) {
			throw new Excp("请输入 _id 或 wordid ", 500, [ 'data'=>$this->data,'query'=>$this->query]);
		}


		if ($_id === null ) {
		
			if ( !empty($wordid) && $_id==null  ) {
				$_id = $World->getVar('_id', "WHERE wordid='$wordid' LIMIT 1");
			}
			if ( $_id  === null ) {
				throw new Excp("世界不存在", 404, [ 'data'=>$this->data,'query'=>$this->query]);
			}
		}


		$resp = $World->delete($_id, true);
		if ( $resp  === false ) {
			throw new Excp("删除世界失败", 500, ['errors'=>$World->errors,'data'=>$this->data,'query'=>$this->query]);
		}

		echo json_encode(['code'=>0, 'message'=>'删除成功']);
	}



	/**
	 * 根据主键更新一条世界  
	 * @api  /apps/helloworld/world/update
	 *
	 * @query|@data $_id   
	 * @query|@data $wordid 世界ID  
     * @data 世界数据 
     *
	 * @return Array World   
	 * 
	 * @package.json: 
	 * "register_api": {
	 * 		...
	 * 		"/world/update": {
	 *			"name":"删除世界",
	 *			"controller":"worldapi",
	 *			"action":"update",
	 *			"public":false
	 *		},
	 *  	...
	 *  }
     *
	 * @example:
	 *	$tuan = new Tuan;
	 *	$resp = $tuan->call('/apps/helloworld/world/update', ['_id'=>'value'],['<key>'=>'<value>',...] );
	 *	$resp = $tuan->call('/apps/helloworld/world/update', ['wordid'=>'value'],['<key>'=>'<value>',...] );
	 */
	function update() {

		$World = App::M('World');
		$_id = (isset($this->data['_id'])) ? $this->data['_id'] : null;
		$_id = (!empty($_id) && isset($this->query['_id'])) ? $_id : $this->query['_id'];
		$wordid = (isset($this->data['wordid'])) ? $this->data['wordid'] : null;
		$wordid = (!empty($wordid) && isset($this->query['wordid'])) ? $wordid : $this->query['wordid'];
		
		if ( $_id === null && $wordid === null ) {
			throw new Excp("请输入 _id 或 wordid ", 500, [ 'data'=>$this->data,'query'=>$this->query]);
		}


		if ($_id === null ) {
		
			if ( !empty($wordid) && $_id==null  ) {
				$_id = $World->getVar('_id', "WHERE wordid='$wordid' LIMIT 1");
			}
			if ( $_id  === null ) {
				throw new Excp("世界不存在", 404, [ 'data'=>$this->data,'query'=>$this->query]);
			}
		}


		$resp = $World->update($_id, $this->data);
		if ( $resp  === false ) {
			throw new Excp("更新世界失败", 500, ['errors'=>$World->errors, 'data'=>$this->data,'query'=>$this->query]);
		}

		echo json_encode($resp);
	}

	

	
	/**
	 * 查询世界  
	 * @api  /apps/helloworld/world/list
	 *
	 * @data 世界查询条件  @see supertable vquery 
     *
	 * @return Array [
	 *		'data'=>[], //记录数组 
	 *		'total'=>$resp->total(),  //记录总数
	 *		'currTotal'=>$resp->currTotal(), //当前页记录总数
	 *		'perpage'=>$resp->perpage(),  // 每页显示数量
	 *		'currPage'=>$resp->currPage(),  //当前页码
	 *      'pages'=>$resp->pages(),   //所有页码
	 *		'nextPage'=>$resp->nextPage()]    //下一页页码
	 * 
	 * @package.json: 
	 * "register_api": {
	 * 		...
	 * 		"/world/list": {
	 *			"name":"查询世界",
	 *			"controller":"worldapi",
	 *			"action":"find",
	 *			"public":false
	 *		},
	 *  	...
	 *  }
     *  
     *
	 * @example:
	 *	$tuan = new Tuan;
	 *	$resp = $tuan->call('/apps/helloworld/world/list', ['page'=>1,'perpage'=>30], ['<condition>'=>'<value>',...] );
	 */
	function find(){
	
		$article = App::M('World');
		$page = (isset($this->query['page']))? intval($this->query['page']) : 1;
		$perpage = (isset($this->query['perpage']))? intval($this->query['perpage']) : 20;
		$resp = $article->vquery($this->data, $page, $perpage);

		echo json_encode([
			'data'=>$resp->toArray(), 
			'total'=>$resp->total(), 
			'currTotal'=>$resp->currTotal(),
			'perpage'=>$resp->perpage(), 
			'pages'=>$resp->pages(), 
			'currPage'=>$resp->currPage(), 
			'nextPage'=>$resp->nextPage()]);
	}

}
