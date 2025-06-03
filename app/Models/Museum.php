<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $table = 'museums';
    protected $fillable = ['name', 'desc', 'location', 'logo_url'];
    public $timestamps = false;

    public function art()
    {
        return $this->hasMany(Art::class);
    }
}