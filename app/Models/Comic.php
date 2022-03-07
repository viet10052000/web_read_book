<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'category_id',
        'genre_id',
        'active',
        'view'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'comic_genre','comic_id','genre_id');
    }
    public function chapters(){
        return $this->hasMany(Chapter::class,'comic_id','id');
    }
}
