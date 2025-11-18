<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'essay_file_id',
        'mentor_id',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke essay
    public function essayFile()
    {
        return $this->belongsTo(EssayFile::class);
    }

    // Relasi ke mentor
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}
