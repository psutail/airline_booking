<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirPortTerminal extends Model
{
    use HasFactory;

   protected $table = 'airport_terminal';

    protected $primaryKey = 'id ';

    public $timestamps = true;
}
