<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function school_subject()
    {
        # creates a relation between AssignSubject and SchoolSubject tables
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }

    public function student_class()
    {
        # creates a relation between AssignSubject and StudentClass tables
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
