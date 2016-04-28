<?php
require_once('loader/Design.php');

class DesignerController extends \Tuanduimao\Loader\Design {
	
	function __construct() {
		parent::__construct(true, 'World');
	}
}