<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EssayFile query()
 * @mixin \Eloquent
 */
class EssayFile extends Model
{
     use HasFactory;
    protected $table = 'essay_file';
    protected $fillable = [
        'user_id',
        'essay_bab',
        'essay_name',
        'essay_file',
        'comment'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Scope untuk search
    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($q) use ($search) {
            $q->whereHas('user', function($userQuery) use ($search) {
                $userQuery->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    public function scopeFilterBab($query, $bab)
    {
        return $query->when($bab, function($q) use ($bab) {
            $q->where('essay_bab', $bab);
        });
    }

    public function scopeFilterUniversity($query, $university)
    {
        return $query->when($university, function($q) use ($university) {
            $q->whereHas('user', function($userQuery) use ($university) {
                $userQuery->where('university', 'like', '%' . $university . '%');
            });
        });
    }

    public function scopeFilterAngkatan($query, $angkatan)
    {
        return $query->when($angkatan, function($q) use ($angkatan) {
            $q->whereHas('user', function($userQuery) use ($angkatan) {
                $userQuery->where('angkatan', $angkatan);
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
