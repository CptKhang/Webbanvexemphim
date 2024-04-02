<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'screening_id',
        'seat_ids',
        'number_of_seats',
        'total_price',
      
    ];

    public function screening()
    {
        return $this->belongsTo(Screenings::class);
    }
  
}