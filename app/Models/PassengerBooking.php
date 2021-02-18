<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassengerBooking extends Model
{
    use HasFactory;

    protected $table = 'passenger_booking';

    protected $primaryKey = 'id ';

    public $timestamps = true;
}
