<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
class UserSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject_id',
    ];

    protected $table="usersubjects";
    protected $hidden=['created_at','updated_at'];

    function subjects() {
        return $this->belongsTo('App\Models\Subject','subject_id','id');

    }

}
