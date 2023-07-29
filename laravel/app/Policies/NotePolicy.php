<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotePolicy
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
    public function view(User $user, Note $note): Response
    {
        return $user->id === $note->author
            ? Response::allow()
            :Response::deny('Only the author of this note can view it.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the note.
     */
    public function update(User $user, Note $note): Response
    {
        return $user->id === $note->author
            ? Response::allow()
            :Response::deny('Only the author of this note can update it.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Note $note): Response
    {
        return $user->id === $note->author
            ? Response::allow()
            :Response::deny('Only the author of this note can delete it');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Note $note): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Note $note): bool
    {
        //
    }
}
