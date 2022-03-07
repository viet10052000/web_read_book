<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'slug' , 'active'
    ];

    public function comics(){
        $this->belongsToMany(Comic::class,'comic_genre','genre_id','comic_id');
    }
}
