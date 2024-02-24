<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'date',
        'hours_worked',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}