<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';
    protected $guarded = [];  
    use HasFactory;

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'TransID');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseID');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'InstructorID');
    }

}
