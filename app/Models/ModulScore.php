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
    protected $table = 'modul_score';

    protected $fillable = [
        'user_id',
        'module_id',
        'score',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
