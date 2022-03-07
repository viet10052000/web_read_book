<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_id',
        'name',
        'description',
        'slug',
        'content',
        'active'
    ];
    public function comic(){
        return $this->belongsTo(Comic::class,'comic_id');
    }
}
