<?php 
namespace common\rbac\rules;

class CompanyOwnedEmployeeRule extends BaseRule{

	public $name = 'isCompanyOwnedEmployee';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
     	return true;      
    }
}

?>