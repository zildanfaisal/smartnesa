<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ModulScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ModulScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ModulScore query()
 * @mixin \Eloquent
 */
class ModulScore extends Model
{
    //


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
