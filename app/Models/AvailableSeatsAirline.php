<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSeatsAirline extends Model
{
    use HasFactory;

    protected $table = 'available_seats';

    protected $primaryKey = 'id ';

    public $timestamps = true;

}
