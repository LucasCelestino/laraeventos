<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $casts = [
        'items'=>'array'
    ];

    protected $dates = ['event_date'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
