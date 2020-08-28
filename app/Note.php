<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [
        'user_id', 'note',
    ];
    protected $table = "notes";

    public function candidate()
    {
        return $this->hasOne("App\Candidate", "id", "user_id");
    }

    public function tags()
    {
        return $this->hasMany("App\AssignedTags", "note_id", "id");
    }
}
