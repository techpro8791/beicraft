<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    public function student()
    {
        # creates a relation between user and assign_student tables
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function discount()
    {
        # creates a relation between assign_student and discount tables
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }

    public function student_class()
    {
        # creates a relation between student_class and assign_student tables
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function student_year()
    {
        # creates a relation between year and assign_student tables
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    public function group()
    {
        # creates a relation between group and assign_student tables
    	return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function shift()
    {
        # creates a relation between shift and assign_student tables
    	return $this->belongsTo(StudentShift::class,'shift_id','id');
    }

}
