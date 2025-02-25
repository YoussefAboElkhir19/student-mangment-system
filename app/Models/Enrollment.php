<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
    protected $fillable = [
        'enrollment_no',
        'student_id',
        'batch_id',
        'join_date',
    ];

    //كل تسجيل عنده طالب واحد
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    // كل تسجيل عنده باتش واحد
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
