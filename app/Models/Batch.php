<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    //
    protected $fillable = ['name', 'start_date', 'end_date', 'course_id'];
    // الباتش الواحد عنده كورس واحد
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // الباتش الواحد عنده اكتر من تسجيل
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
