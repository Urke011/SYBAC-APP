<?php

namespace App\Policies;

use App\Constants\DefaultRoles;
use App\Constants\Permissions;
use App\Models\Calculation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalculationPolicy
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
        return  $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_CALCULATIONS));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Calculation $calculation)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_CALCULATION));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS)) && $user->can(Permissions::getPermissionKey(Permissions::CREATE_CALCULATION));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Calculation $calculation)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS)) && $user->can(Permissions::getPermissionKey(Permissions::UPDATE_CALCULATION));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Calculation $calculation)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_CALCULATIONS)) && $user->can(Permissions::getPermissionKey(Permissions::DELETE_CALCULATION));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Calculation $calculation)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Calculation $calculation)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }
}
