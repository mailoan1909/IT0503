<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table ="product";
    public $primaryKey ='id';
    public $fillable=['name','description','price','image','audio','category_id','singer'];
    public function category(){
        return $this ->belongsTo('App\Models\Category','category_id');
    }
}
