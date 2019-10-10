<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 

class AdminRole extends BaseRole{
	
	const NAME = 'admin';
	public $name = 'admin';
	public static $instance = null;

	public function addPermissions($permissions)
	{
		foreach ($permissions as $permission) {
			$this->addChild($permission);
		}
	}
}