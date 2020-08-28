<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'date_of_birth',        
    ];

    protected $hidden = [
        'password',
    ];    

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
