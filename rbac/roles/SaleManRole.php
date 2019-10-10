<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 

class SaleManRole extends BaseRole{
	
	const NAME = 'saler';
	public $name = 'saler';
	public static $instance = null;
	
}