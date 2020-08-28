<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedTags extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tag_id', 'note_id',
    ];
    protected $table = "note_tags";

    public function tag()
    {
        return $this->hasOne("App\Tag", "id", "tag_id");
    }
}
