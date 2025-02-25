<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'enrollment_id',
        'paid_date',
        'price'
    ];
    // كل تسجبل عنده فاتوره دفع
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
