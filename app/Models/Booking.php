<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'title',
        'description',
        'book_date',
        'book_time',

    ];

}
