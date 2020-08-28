<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = "candidates";
    protected $fillable = ['name', 'email', 'image', 'pdf', 'password', 'birth_date', 'gender', 'phone', 'city', 'country'];

    public function note()
    {
        return $this->hasOne("App\Note", "user_id", "id");
    }
}
