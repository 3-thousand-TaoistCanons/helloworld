<?php
require_once('loader/Upload.php');
class UploaderController extends \Tuanduimao\Loader\Upload {
	function __construct() {
		parent::__construct('local://public');
	}
}