<?php

namespace App\Policies;

use App\Policies\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tag can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the tag can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tag  $model
     * @return mixed
     */
    public function view(User $user, Tag $model)
    {
        return true;
    }

    /**
     * Determine whether the tag can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the tag can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tag  $model
     * @return mixed
     */
    public function update(User $user, Tag $model)
    {
        return true;
    }

    /**
     * Determine whether the tag can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tag  $model
     * @return mixed
     */
    public function delete(User $user, Tag $model)
    {
        return true;
    }

    /**
     * Determine whether the tag can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tag  $model
     * @return mixed
     */
    public function restore(User $user, Tag $model)
    {
        return true;
    }

    /**
     * Determine whether the tag can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Tag  $model
     * @return mixed
     */
    public function forceDelete(User $user, Tag $model)
    {
        return true;
    }
}
