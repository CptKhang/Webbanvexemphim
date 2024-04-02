<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;
    protected $table ='Seats';
    protected $primaryKey = 'SeatID';
    protected $keyType = 'string';
    public $timestamps = false;

    public function screening()
    {
        return $this->belongsTo(Screenings::class);
    }
}
