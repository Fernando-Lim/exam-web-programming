<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $guarded = [];  
    use HasFactory;


    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'InstructorID');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'TopicID');
    }


}
