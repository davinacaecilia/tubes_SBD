<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'arts';
    protected $fillable = ['title', 'created', 'desc', 'creator', 'img_url', 'museum_id', 'medium_id'];
    public $timestamps = false;

    public function museum()
    {
        return $this->belongsTo(Museum::class);
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }
}