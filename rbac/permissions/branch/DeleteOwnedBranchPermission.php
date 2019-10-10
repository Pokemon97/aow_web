<?php

namespace common\rbac\permissions\branch;

class DeleteOwnedBranchPermission extends \common\rbac\permissions\BasePermission{
	public $name = 'deleteOwnedBranch';
	public $description = 'permission of branch';
}

?>