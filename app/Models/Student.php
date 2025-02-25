<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'email',
        'mobile'
    ];
    // //طالب واحد بينتمي الي مدرس ولحد
    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }
    // // طالب عنده كورس واحد
    // public function course()
    // {
    //     return  $this->belongsTo(Course::class);
    // }
    // // طالب عنده اكتر من تسجيل
    public function enrollments()
    {
        $this->hasMany(Enrollment::class);
    }
}
