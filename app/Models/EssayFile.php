<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile query()
 * @mixin \Eloquent
 */
class EssayFile extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
