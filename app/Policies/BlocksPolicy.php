<?php

namespace App\Policies;

use App\Model\Admin;
use Auth;
use App\Model\User;
use App\Model\Block;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlocksPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @param Block $block
     * @return bool
     */
    public function delete(User $user, Block $block)
    {
        return $user->id === $block->user_id;
    }

    /**
     * @param User $user
     * @param Block $block
     * @return bool
     */
    public function check(User $user, Block $block)
    {
        return true;
    }
}
