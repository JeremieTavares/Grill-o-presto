<?php

namespace App\Trait;

use App\Models\Role;


trait RolesAvailable
{
    // public function getAllAvailableRoles(){
    //     $role = new Role;
    //     // dd($role->get_role_client());
    //     $userTemplate = (object) $role->all();
    //     $client_role = $userTemplate->get_role_client();
    //     $admin_1_role = $userTemplate->get_role_admin_1();
    //     $admin_2_role = $userTemplate->get_role_admin_2();
    //     $admin_3_role = $userTemplate->get_role_admin_3();

    //     return [
    //         'Client' => $client_role,
    //         'Admin_1' => $admin_1_role,
    //         'Admin_2' => $admin_2_role,
    //         'Admin_3' => $admin_3_role,
    //     ];
    // }


    private $USER_ROLE;
    private $USER_ROLE_CLIENT;
    private $ADMIN_ROLE_1;
    private $ADMIN_ROLE_2;
    private $ADMIN_ROLE_3;


    public function get_user_role($role)
    {
        return $this->USER_ROLE = $this->getAllRoles($role);
    }

    public function get_role_client()
    {
        return $this->USER_ROLE_CLIENT = $this->getAllRoles('Client');
    }

    public function get_role_admin_1()
    {
        return $this->ADMIN_ROLE_1 = $this->getAllRoles('Admin_1');
    }

    public function get_role_admin_2()
    {
        return $this->ADMIN_ROLE_2 = $this->getAllRoles('Admin_2');
    }

    public function get_role_admin_3()
    {
        return $this->ADMIN_ROLE_3 = $this->getAllRoles('Admin_3');
    }

    public function getAllRoles($role)
    {
        $roles = $this->all();
        foreach ($roles as $type) {
            if ($role == $type->role) {
                return $this->USER_ROLE_CLIENT = $type->id;
            } elseif ($role == $type->role) {
                return $this->ADMIN_ROLE_1 = $type->id;
            } elseif ($role == $type->role) {
                return $this->ADMIN_ROLE_2 = $type->id;
            } elseif ($role == $type->role) {
                return $this->ADMIN_ROLE_3 = $type->id;
            }
        }
    }
}
