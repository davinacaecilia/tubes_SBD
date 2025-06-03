<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $table = 'mediums';
    protected $fillable = ['name', 'desc', 'img_url'];
    public $timestamps = false;

    public function art()
    {
        return $this->hasMany(Art::class);
    }
}