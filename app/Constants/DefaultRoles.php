<?php

namespace App\Constants;

use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultRoles
{
    /**************************************
     * Default System Roles
     **************************************/
    const SUPER_USER = [
        'key' => 'super-user',
        'title' => 'Super User',
        'description' => 'Rolle welche zu allem berechtigt ist',
        'guard' => null
    ];

    const MANAGEMENT = [
        'key' => 'management',
        'title' => 'Management',
        'description' => 'Rolle mit Zugang zum Frontend und Backend',
        'guard' => null
    ];

    const EMPLOYEE = [
        'key' => 'mitarbeiter',
        'title' => 'Mitarbeiter',
        'description' => 'Rolle mit Zugang zum Frontend',
        'guard' => null
    ];

    private static function allDefaultRolesAsArray()
    {
        $allDefaultRoles = [];

        array_push($allDefaultRoles, DefaultRoles::SUPER_USER);
        array_push($allDefaultRoles, DefaultRoles::MANAGEMENT);
        array_push($allDefaultRoles, DefaultRoles::EMPLOYEE);

        return $allDefaultRoles;
    }

    public static function isDefaultRole($key)
    {
        $roleKeys = array_map(fn ($role) => $role['key'], DefaultRoles::allDefaultRolesAsArray());

        return in_array($key, $roleKeys);
    }

    public function getRoleKey($role)
    {
        if (!array_key_exists('key', $role)) throw new HttpException('no key found');

        return $role['key'];
    }


    public static function getRoleGuard($role)
    {
        if (!array_key_exists('guard', $role)) throw new HttpException('no guard found');

        return $role['guard'];
    }
}
