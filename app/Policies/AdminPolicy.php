<?php

namespace App\Policies;

use App\Model\Block;
use App\Model\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

    public function before(Admin $user, $abality)
    {
        if ($user->super == true)
        {
            return true;
        }
    }

    public function manage(Admin $user)
    {
        return $user->super == true;
    }
}
