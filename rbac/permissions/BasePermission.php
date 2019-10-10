<?php 
namespace common\rbac\permissions;
use \yii\rbac\Permission;
use Yii;

class BasePermission extends Permission{

	public $name = 'base';
	public $description = 'base';

    public function init()
    {
        parent::init();
        $auth = Yii::$app->authManager;
        $permission = $auth->getPermission($this->name);
        if (!$permission) {
            $permission = $auth->createPermission($this->name);
            $auth->add($permission);
        }
    }

    public function addRule($rule)
    {
    	$this->ruleName = $rule->name;
    	Yii::$app->authManager->update($this->name, $this);
    }

    public function addChild($child)
    {
    	Yii::$app->authManager->addChild($this, $child);
    }

    public function hasChild($permission)
    {
        return Yii::$app->authManager->hasChild($this, $permission);
    }

    public function getChildren()
    {
        return Yii::$app->authManager->getChildren($this->name);
    }

    public function removeChildren()
    {
        if (!(Yii::$app->authManager->removeChildren($this))) {
            throw new Exception("Error remove children of permission: ".$this->name);
        }
    }

    public function createPermissionSegment($child_permission, $rule = null)
    {
        if ($rule != null) {
            $this->addRule($rule);
        }
        $this->addChild($child_permission);
    }

    public static function deletePermissionSegment($permission, $remove = true)
    {
        if ( $remove ) {
            $permission_children = $permission->getChildren();
            $permission->removeChildren();
            foreach ($permission_children as $permission_child) {
                Yii::$app->authManager->remove($permission_child);
            }
            Yii::$app->authManager->remove($permission);
        } else {
            $permission->removeChildren();
        }
    }

}

?>