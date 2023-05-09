<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PermissionService
{
    private static function isModerator(User $user): bool
    {
        if (isset($user->is_moderator)) {
            return $user->is_moderator === true;
        }
        return false;
    }

    private static function isAuthor($resource): bool
    {
        if (isset($resource->user->id)) {
            return $resource->user->id === Auth::user()->id;
        }

        if (isset($resource->user_id)) {
            return $resource->user_id === Auth::user()->id;
        }
        return false;
    }

    public static function checkPermission($resource = null, User $user = null): bool
    {
        if (!$user) {
            $user = Auth::user();
        }

        if (self::isModerator($user)) {
            return true;
        }

        if (self::isAuthor($resource)) {
            return true;
        }
        return false;
    }
}
