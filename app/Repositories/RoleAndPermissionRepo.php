<?php
/**
 * Created by PhpStorm.
 * User: PC-Cordon
 * Date: 29/10/2019
 * Time: 10:36
 */

namespace App\Repositories;


use Spatie\Permission\Models\Role;

class RoleAndPermissionRepo
{
    public function roles() {
        return Role::all();
    }

}