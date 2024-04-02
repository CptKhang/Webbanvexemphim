<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $table ='Movies';
    protected $primaryKey = 'MovieID';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable =['title','duration','director','actors','genre','rating','image','slug'];
    
    public function screenings()
    {
        return $this->hasMany(Screenings::class);
    }
}
