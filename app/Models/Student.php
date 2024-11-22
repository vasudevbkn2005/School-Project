<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'mobile',
        'email',
        'image',
        'enrollment_number',
        'dob',
        'address',
        'admission_date',
        'gender',
        'class_id',
        'section_id', 
    ];

    // Define relationship with Class
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id'); // Use appropriate model name for the Class
    }

    // Define relationship with Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
