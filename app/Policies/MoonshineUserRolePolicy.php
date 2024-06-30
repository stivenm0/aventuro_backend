<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use MoonShine\Models\MoonshineUser;

class MoonshineUserRolePolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function view(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function create(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function update(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function delete(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function restore(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function forceDelete(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }

    public function massDelete(MoonshineUser $user)
    {
        return $user->isSuperUser();
    }
}
