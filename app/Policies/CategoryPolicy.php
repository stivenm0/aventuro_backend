<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Category;
use MoonShine\Models\MoonshineUser;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
        
    }

    public function view(MoonshineUser $user, Category $item)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function create(MoonshineUser $user)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function update(MoonshineUser $user, Category $item)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function delete(MoonshineUser $user, Category $item)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function restore(MoonshineUser $user, Category $item)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function forceDelete(MoonshineUser $user, Category $item)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }

    public function massDelete(MoonshineUser $user)
    {
        return $user->moonshineUserRole->name != 'Support Agent';
    }
}
