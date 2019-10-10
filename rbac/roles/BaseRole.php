<?php 

namespace common\rbac\roles;
use yii\rbac\Role; 
use yii\rbac\Item;
use Yii;

class BaseRole extends Role{
	
	const NAME = 'base';
	public $name = 'base';

	public function init()
	{
		parent::init();
		$role = Yii::$app->authManager->getRole($this->name);
		if (!$role) {
			$role = Yii::$app->authManager->createRole($this->name);
			Yii::$app->authManager->add($role);
		}
	}

	public function addChild($child)
	{
		Yii::$app->authManager->addChild($this, $child);
	}

	public function addPermission($permission)
	{
		if ($permission->type == Item::TYPE_PERMISSION) {
			$this->addChild($permission);
		} else {
			throw new Exception("Error exec add permission for non permission type.");
		}
	}

	public function removePermissions()
	{
		if (!(Yii::$app->authManager->removeChildren($this))) {
            throw new Exception("Error remove children of permission: ".$this->name);
        }
	}
}
