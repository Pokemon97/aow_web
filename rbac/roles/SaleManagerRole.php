<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 

class SaleManagerRole extends BaseRole{
	
	const NAME = 'manager';
	public $name = 'manager';
	public static $instance = null;
	
}