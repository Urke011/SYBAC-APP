<?php

namespace App\Policies;

use App\Constants\DefaultRoles;
use App\Constants\Permissions;
use App\Models\Subsection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubsectionPolicy
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
        return  $user->can(Permissions::getPermissionKey(Permissions::ACCESS_SUBSECTIONS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_SUBSECTIONS));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Subsection $subsection)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_SUBSECTIONS)) && $user->can(Permissions::getPermissionKey(Permissions::READ_SUBSECTION));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_SUBSECTIONS)) && $user->can(Permissions::getPermissionKey(Permissions::CREATE_SUBSECTION));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Subsection $subsection)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_SUBSECTIONS)) && $user->can(Permissions::getPermissionKey(Permissions::UPDATE_SUBSECTION));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Subsection $subsection)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_SUBSECTIONS)) && $user->can(Permissions::getPermissionKey(Permissions::DELETE_SUBSECTION));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Subsection $subsection)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Subsection $subsection)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }
}
