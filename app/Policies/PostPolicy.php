<?php

namespace App\Policies;

use App\Policies\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the post can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the post can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Post  $model
     * @return mixed
     */
    public function view(User $user, Post $model)
    {
        return true;
    }

    /**
     * Determine whether the post can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the post can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Post  $model
     * @return mixed
     */
    public function update(User $user, Post $model)
    {
        return true;
    }

    /**
     * Determine whether the post can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Post  $model
     * @return mixed
     */
    public function delete(User $user, Post $model)
    {
        return true;
    }

    /**
     * Determine whether the post can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Post  $model
     * @return mixed
     */
    public function restore(User $user, Post $model)
    {
        return true;
    }

    /**
     * Determine whether the post can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Post  $model
     * @return mixed
     */
    public function forceDelete(User $user, Post $model)
    {
        return true;
    }
}
