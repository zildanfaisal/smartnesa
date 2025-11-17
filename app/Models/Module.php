<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'link',
        'order',
        'is_active',
    ];
     protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Relasi ke modules_score
    public function scores()
    {
        return $this->hasMany(ModulScore::class, 'module_id');
    }
}
