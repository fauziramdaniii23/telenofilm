<?php

namespace App\Policies;

use App\Models\ImagePrewedding;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImagePreweddingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ImagePrewedding $imagePrewedding): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ImagePrewedding $imagePrewedding): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ImagePrewedding $imagePrewedding): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ImagePrewedding $imagePrewedding): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ImagePrewedding $imagePrewedding): bool
    {
        //
    }
}
