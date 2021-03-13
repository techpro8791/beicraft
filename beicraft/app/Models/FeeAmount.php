<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    public function fee_category()
    {
        # creates a relation between FeeAmount and FeeCategory tables
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function student_class()
    {
        # creates a relation between FeeAmount and StudentClass tables
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
