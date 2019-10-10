<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 

class AdministrativeStaffRole extends BaseRole{
	
	const NAME = 'staff';
	public $name = 'staff';
	public static $instance = null;
	
}