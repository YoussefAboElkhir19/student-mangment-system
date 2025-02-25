<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name', 'duration', 'content'];
    //كورس الواحد عنده اكتر من باتش
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
    // كورس واحد عنده اكتر من طالب
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
