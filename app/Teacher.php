<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'course',
        'date_of_entry',        
    ];
    
    protected $hidden = [
        'password',
    ];
        
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
