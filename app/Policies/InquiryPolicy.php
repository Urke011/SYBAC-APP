<?php

namespace App\Policies;

use App\Constants\DefaultRoles;
use App\Constants\Permissions;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InquiryPolicy
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
        return  $user->can(Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES)) && $user->can(Permissions::getPermissionKey(Permissions::READ_INQUIRIES));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Inquiry $inquiry)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES)) && $user->can(Permissions::getPermissionKey(Permissions::READ_INQUIRY));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES)) && $user->can(Permissions::getPermissionKey(Permissions::CREATE_INQUIRY));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Inquiry $inquiry)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES)) && $user->can(Permissions::getPermissionKey(Permissions::UPDATE_INQUIRY));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Inquiry $inquiry)
    {
        return $user->can(Permissions::getPermissionKey(Permissions::ACCESS_INQUIRIES)) && $user->can(Permissions::getPermissionKey(Permissions::DELETE_INQUIRY));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Inquiry $inquiry)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Inquiry $inquiry)
    {
        return $user->hasRole(DefaultRoles::SUPER_USER);
    }
}
