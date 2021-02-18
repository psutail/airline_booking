<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AircraftInfo extends Model
{
    use HasFactory;

    protected $table = 'aircarft_info';

    protected $primaryKey = 'id ';

    public $timestamps = true;
}
