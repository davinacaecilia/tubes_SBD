<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = ['user_id', 'entity_type', 'entity_id', 'date_added'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entity()
    {
        return match ($this->entity_type) {
            'art' => $this->belongsTo(Art::class, 'entity_id'),
            'medium' => $this->belongsTo(Medium::class, 'entity_id'),
        };
    }
}