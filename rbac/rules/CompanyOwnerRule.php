<?php 
namespace common\rbac\rules;
use yii\helpers\ArrayHelper;
use common\models\company\CompanyOwner;

class CompanyOwnerRule extends BaseRule{

	public $name = 'isCompanyOwner';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {   
        $companyOwner = CompanyOwner::find()->where([
            'company_id' => $params['model']->id,  
            'user_id' => $user,
            ])->all();

     	return $companyOwner != null;      
    }
}

?>