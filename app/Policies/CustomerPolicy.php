<?php

namespace App\Policies;

use App\Constants\DefaultRoles;
use App\Constants\Permissions;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return  $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_CUSTOMERS));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Customer $customer)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_CUSTOMER));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS)) && $user->can(Permissions::getPermissionKey(Permissions::CREATE_CUSTOMER));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Customer $customer)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS)) && $user->can(Permissions::getPermissionKey(Permissions::UPDATE_CUSTOMER));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Customer $customer)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CUSTOMERS)) && $user->can(Permissions::getPermissionKey(Permissions::DELETE_CUSTOMER));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Customer $customer)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Customer $customer)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }
}
