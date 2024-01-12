<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'score',
        'teacher_id'
    ];

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function activities(){
        return $this->belongsToMany(Activity::class);
    }

}
