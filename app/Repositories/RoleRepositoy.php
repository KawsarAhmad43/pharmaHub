<?php


use App\Models\Role;

class RoleRepository
{
    public function getAllRoles()
    {
        return Role::all();
    }
}
