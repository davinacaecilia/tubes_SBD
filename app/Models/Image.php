<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['url', 'art_id'];
    public $timestamps = false;

    public function art()
    {
        return $this->belongsTo(Art::class);
    }
}