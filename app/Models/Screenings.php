<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movies;

class Screenings extends Model
{
    use HasFactory;
    protected $table ='Screenings';
    protected $primaryKey = 'ScreeningID';
    protected $keyType = 'string';
    public $timestamps = false;

    public function movie()
{
    return $this->belongsTo(Movies::class, 'MovieID', 'MovieId');
}
public function seats()
{
    return $this->hasMany(Seats::class, 'ScreeningID', 'ScreeningID');
}

}
