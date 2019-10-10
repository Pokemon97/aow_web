<?php 

NAMEspace common\rbac\roles;
use yii\rbac\Role; 
use \common\rbac\roles\UserRole;
use \common\rbac\roles\AdminRole;
use \common\rbac\roles\AdminstrativeStaffRole;
use \common\rbac\roles\SaleManagerRole;
use \common\rbac\roles\SaleManRole;
use \common\rbac\roles\BaseRole;
use Yii;

class RoleFactory {
	
	public static function getRole($roleNAME)
	{
		$role = Yii::$app->authManager->getRole($roleNAME);
		switch ($role->name) {
			case UserRole::NAME:
				return new UserRole();
				break;
			case AdminRole::NAME:
				return new AdminRole();
				break;
			case AdminstrativeStaffRole::NAME:
				return new AdminstrativeStaffRole();
				break;
			case SaleManagerRole::NAME:
				return new SaleManagerRole();
				break;
			case SaleManRole::NAME:
				return new SaleManRole();
				break;
			default:
				return new BaseRole();
				break;
		}
	}
}
