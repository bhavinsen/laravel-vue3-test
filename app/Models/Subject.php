<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    protected $table="subjects";
    protected $hidden=['created_at','updated_at'];
    function subjects() {
        return $this->belongsTo(Subject::class ,'subject_id');
    }

}
