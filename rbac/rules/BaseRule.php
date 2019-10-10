<?php 
namespace common\rbac\rules;
use \yii\rbac\Rule;
use Yii;

class BaseRule extends Rule{

	public $name = 'base';

  public function init()
  {
    parent::init();
    $rule = Yii::$app->authManager->getRule($this->name);
    if (!$rule) {
	    Yii::$app->authManager->add($this);
    }
  }

  public function execute($user, $item, $params)
  {

  }

  public static function remove($rule)
  {
    if (!(Yii::$app->authManager->remove($rule))) {
      throw new Exception("Error can't remove ".$rule->name." from rbac system");
    }
  }
}

?>