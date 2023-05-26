<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table ="category";
    public $primaryKey ='id';
    public $fillable=['name','description'];
    public function products(){
        return $this ->hasMany('App\Models\Product');
    }
}
