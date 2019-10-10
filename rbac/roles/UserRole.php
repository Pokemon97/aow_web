<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 

class UserRole extends BaseRole{
	
	const NAME = 'user';
	public $name = 'user';
	public static $instance = null;
	
}
