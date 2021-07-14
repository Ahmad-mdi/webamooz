<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->permissions()
            ->where('title' , $permission->title)
            ->exists();
    }

    public static function findByTitle($title)
    {
        return self::query()->whereTitle('normal-user' , $title)->firstOrFail();
    }
}
