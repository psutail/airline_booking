<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassengerList extends Model
{
    use HasFactory;

    protected $table = 'passenger_list';

    protected $primaryKey = 'id ';

    public $timestamps = true;
}
