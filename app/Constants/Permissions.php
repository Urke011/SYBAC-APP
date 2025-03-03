<?php

namespace App\Constants;

use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Permissions
{
    public const PERMISSON_GROUPS = [
        'common' => 'common',
        'users' => 'users',
        'roles' => 'roles',
        'customers' => 'customers',
        'offers' => 'offers',
        'calculations' => 'calculations',
        'inquiries' => 'inquiries',
        'subsections' => 'subsections',
        'components' => 'components',
    ];

    public static function getPermissionKey($permission)
    {
        if (!array_key_exists('key', $permission)) throw new HttpException('no key found');

        return $permission['key'];
    }


    public static function getPermissionGuard($permission)
    {
        if (!array_key_exists('guard', $permission)) throw new HttpException('no guard found');

        return $permission['guard'];
    }

    public static function getPermissionTitle($permission)
    {
        if (!array_key_exists('title', $permission)) throw new HttpException('no title found');

        return $permission['title'];
    }

    public static function getPermissionDescription($permission)
    {
        if (!array_key_exists('description', $permission)) throw new HttpException('no description found');

        return $permission['description'];
    }

    public static function getPermissionParentKey($permission)
    {
        if (!array_key_exists('parent', $permission)) throw new HttpException('no parent found');

        return $permission['parent'];
    }

    public static function getPermissionGroup($permission)
    {
        if (!array_key_exists('group', $permission)) throw new HttpException('no group found');

        return $permission['group'];
    }

    public static function findPermissionParentKey($key)
    {
        $permissions = Permissions::getAllSystemPermissions();
        $index = array_search($key, array_column($permissions, 'key'));

        if ($index < 0) return null;

        return Permissions::getPermissionParentKey($permissions[$index]);
    }

    public static function getPermissionModel($permission, $withParent = false)
    {
        return [
            'id' =>  Uuid::uuid4(),
            'name' => Permissions::getPermissionKey($permission),
            'guard_name' => Permissions::getPermissionGuard($permission),
            'title' => Permissions::getPermissionTitle($permission),
            'description' => Permissions::getPermissionDescription($permission),
            'group' => Permissions::getPermissionGroup($permission),
            'parent_id' => $withParent && Permissions::getPermissionParentKey($permission)  ? Permission::findByName(Permissions::getPermissionParentKey($permission))->id : null,
        ];
    }

    #region Common
    const ACCESS_FRONTEND = [
        'key' => 'access-frontend',
        'title' => 'Zugriff auf das Frontend',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_BACKEND = [
        'key' => 'access-backend',
        'title' => 'Zugriff auf das Backend',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_USERS = [
        'key' => 'access-users',
        'title' => 'Zugriff auf Benutzer',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_ROLES = [
        'key' => 'access-roles',
        'title' => 'Zugriff auf Rollen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_CUSTOMERS = [
        'key' => 'access-customers',
        'title' => 'Zugriff auf Kunden',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_INQUIRIES = [
        'key' => 'access-inquiries',
        'title' => 'Zugriff auf Anfrage',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];


    const ACCESS_CALCULATIONS  = [
        'key' => 'access-calculations',
        'title' => 'Zugriff auf Kalkuationen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_OFFERS  = [
        'key' => 'access-offers',
        'title' => 'Zugriff auf Angebote',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_SUBSECTIONS  = [
        'key' => 'access-subsections',
        'title' => 'Zugriff auf Gewerke',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];

    const ACCESS_COMPONENTS  = [
        'key' => 'access-components',
        'title' => 'Zugriff auf Bauteile',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['common'],
        'guard' => 'web',
        'parent' => null
    ];
    #endregion

    #region  User-Management
    const CREATE_USER = [
        'key' => 'create-user',
        'title' => 'Benutzer erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['users'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_USERS['key']
    ];

    const UPDATE_USER = [
        'key' => 'update-user',
        'title' => 'Benutzer bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['users'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_USERS['key']
    ];

    const DELETE_USER = [
        'key' => 'delete-user',
        'title' => 'Benutzer löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['users'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_USERS['key']
    ];

    const READ_USER = [
        'key' => 'read-user',
        'title' => 'Benutzer ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['users'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_USERS['key']
    ];

    const READ_USERS = [
        'key' => 'read-users',
        'title' => 'Benutzerübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['users'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_USERS['key']
    ];
    #endregion

    #region  Role-Management
    const CREATE_ROLE = [
        'key' => 'create-role',
        'title' => 'Rolle erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['roles'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_ROLES['key']
    ];

    const UPDATE_ROLE = [
        'key' => 'update-role',
        'title' => 'Rolle bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['roles'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_ROLES['key']
    ];

    const DELETE_ROLE =  [
        'key' => 'delete-role',
        'title' => 'Rolle löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['roles'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_ROLES['key']
    ];

    const READ_ROLE = [
        'key' => 'read-role',
        'title' => 'Rolle ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['roles'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_ROLES['key']
    ];

    const READ_ROLES = [
        'key' => 'read-roles',
        'title' => 'Rollenübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['roles'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_ROLES['key']
    ];
    #endregion

    #region Customer-Management
    const CREATE_CUSTOMER = [
        'key' => 'create-customer',
        'title' => 'Kunde erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['customers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CUSTOMERS['key']
    ];

    const UPDATE_CUSTOMER = [
        'key' => 'update-customer',
        'title' => 'Kunde bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['customers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CUSTOMERS['key']
    ];

    const DELETE_CUSTOMER =  [
        'key' => 'delete-customer',
        'title' => 'Kunde löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['customers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CUSTOMERS['key']
    ];

    const READ_CUSTOMER = [
        'key' => 'read-customer',
        'title' => 'Kunde ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['customers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CUSTOMERS['key']
    ];

    const READ_CUSTOMERS = [
        'key' => 'read-customers',
        'title' => 'Kundenübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['customers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CUSTOMERS['key']
    ];
    #endregion

    #region Inquiry-Management
    const CREATE_INQUIRY = [
        'key' => 'create-inquiry',
        'title' => 'Anfrage erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['inquiries'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_INQUIRIES['key']
    ];

    const UPDATE_INQUIRY = [
        'key' => 'update-inquiry',
        'title' => 'Anfrage bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['inquiries'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_INQUIRIES['key']
    ];

    const DELETE_INQUIRY =  [
        'key' => 'delete-inquiry',
        'title' => 'Anfrage löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['inquiries'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_INQUIRIES['key']
    ];

    const READ_INQUIRY = [
        'key' => 'read-inquiry',
        'title' => 'Anfrage ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['inquiries'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_INQUIRIES['key']
    ];

    const READ_INQUIRIES = [
        'key' => 'read-inquiries',
        'title' => 'Anfrangenübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['inquiries'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_INQUIRIES['key']
    ];
    #endregion

    #region Calculation-Management
    const CREATE_CALCULATION = [
        'key' => 'create-calculation',
        'title' => 'Kalkulation erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['calculations'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CALCULATIONS['key']
    ];

    const UPDATE_CALCULATION = [
        'key' => 'update-calculation',
        'title' => 'Kalkulation bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['calculations'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CALCULATIONS['key']
    ];

    const DELETE_CALCULATION =  [
        'key' => 'delete-calculation',
        'title' => 'Kalkulation löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['calculations'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CALCULATIONS['key']
    ];

    const READ_CALCULATION = [
        'key' => 'read-calculation',
        'title' => 'Kalkulation ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['calculations'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CALCULATIONS['key']
    ];

    const READ_CALCULATIONS = [
        'key' => 'read-calculations',
        'title' => 'Kalkulationsübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['calculations'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_CALCULATIONS['key']
    ];
    #endregion

    #region Offer-Management
    const CREATE_OFFER = [
        'key' => 'create-offer',
        'title' => 'Angebot erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['offers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const UPDATE_OFFER = [
        'key' => 'update-offer',
        'title' => 'Angebot bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['offers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const DELETE_OFFER =  [
        'key' => 'delete-offer',
        'title' => 'Angebot löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['offers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const READ_OFFER = [
        'key' => 'read-offer',
        'title' => 'Angebot ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['offers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const READ_OFFERS = [
        'key' => 'read-offers',
        'title' => 'Angebotsübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['offers'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];
    #endregion

    #region Subsection-Management
    const CREATE_SUBSECTION = [
        'key' => 'create-subsection',
        'title' => 'Gewerk erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['subsections'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const UPDATE_SUBSECTION = [
        'key' => 'update-subsection',
        'title' => 'Gewerk bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['subsections'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const DELETE_SUBSECTION =  [
        'key' => 'delete-subsection',
        'title' => 'Gewerk löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['subsections'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const READ_SUBSECTION = [
        'key' => 'read-subsection',
        'title' => 'Gewerk ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['subsections'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];

    const READ_SUBSECTIONS = [
        'key' => 'read-subsections',
        'title' => 'Gewerkübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['subsections'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_OFFERS['key']
    ];
    #endregion

    #region Components-Management
    const CREATE_COMPONENT = [
        'key' => 'create-components',
        'title' => 'Bauteil erstellen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['components'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_COMPONENTS['key']
    ];

    const UPDATE_COMPONENT = [
        'key' => 'update-components',
        'title' => 'Bauteil bearbeiten',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['components'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_COMPONENTS['key']
    ];

    const DELETE_COMPONENT =  [
        'key' => 'delete-components',
        'title' => 'Bauteil löschen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['components'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_COMPONENTS['key']
    ];

    const READ_COMPONENT = [
        'key' => 'read-components',
        'title' => 'Bauteil ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['components'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_COMPONENTS['key']
    ];

    const READ_COMPONENTS = [
        'key' => 'read-componentss',
        'title' => 'Bauteilübersicht ansehen',
        'description' => null,
        'group' => Permissions::PERMISSON_GROUPS['components'],
        'guard' => 'web',
        'parent' => Permissions::ACCESS_COMPONENTS['key']
    ];
    #endregion



    public static function getAllSystemPermissions()
    {
        return [
            Permissions::ACCESS_FRONTEND,
            Permissions::ACCESS_BACKEND,
            Permissions::ACCESS_USERS,
            Permissions::ACCESS_ROLES,
            Permissions::ACCESS_CUSTOMERS,
            Permissions::ACCESS_INQUIRIES,
            Permissions::ACCESS_CALCULATIONS,
            Permissions::ACCESS_OFFERS,
            Permissions::ACCESS_SUBSECTIONS,
            Permissions::ACCESS_COMPONENTS,
            Permissions::CREATE_USER,
            Permissions::READ_USER,
            Permissions::READ_USERS,
            Permissions::UPDATE_USER,
            Permissions::DELETE_USER,
            Permissions::CREATE_ROLE,
            Permissions::READ_ROLE,
            Permissions::READ_ROLES,
            Permissions::UPDATE_ROLE,
            Permissions::DELETE_ROLE,
            Permissions::CREATE_CUSTOMER,
            Permissions::READ_CUSTOMER,
            Permissions::READ_CUSTOMERS,
            Permissions::UPDATE_CUSTOMER,
            Permissions::DELETE_CUSTOMER,
            Permissions::CREATE_INQUIRY,
            Permissions::READ_INQUIRY,
            Permissions::READ_INQUIRIES,
            Permissions::UPDATE_INQUIRY,
            Permissions::DELETE_INQUIRY,
            Permissions::CREATE_CALCULATION,
            Permissions::READ_CALCULATION,
            Permissions::READ_CALCULATIONS,
            Permissions::UPDATE_CALCULATION,
            Permissions::DELETE_CALCULATION,
            Permissions::CREATE_OFFER,
            Permissions::READ_OFFER,
            Permissions::READ_OFFERS,
            Permissions::UPDATE_OFFER,
            Permissions::DELETE_OFFER,
            Permissions::CREATE_SUBSECTION,
            Permissions::READ_SUBSECTION,
            Permissions::READ_SUBSECTIONS,
            Permissions::UPDATE_SUBSECTION,
            Permissions::DELETE_SUBSECTION,
            Permissions::CREATE_COMPONENT,
            Permissions::READ_COMPONENT,
            Permissions::READ_COMPONENTS,
            Permissions::UPDATE_COMPONENT,
            Permissions::DELETE_COMPONENT,
        ];
    }
}
