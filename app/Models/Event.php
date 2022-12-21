<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='events';
    protected $fillable =[
        'title','genre_id','venue_id','artist_id','amount','image','date','short_description','status'
    ];
}
