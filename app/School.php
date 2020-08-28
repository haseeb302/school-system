<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'address', 'contact', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
