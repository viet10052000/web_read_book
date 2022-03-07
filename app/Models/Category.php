<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'slug',
        'active',
    ];
    public function comics(){
        return $this->hasMany(Comic::class,'category_id','id');
    }



}
