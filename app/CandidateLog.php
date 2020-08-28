<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateLog extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = "candidates_logs";
    protected $fillable = ['name', 'email', 'image', 'pdf', 'password', 'birth_date', 'gender', 'phone', 'city', 'country', 'status'];
}
