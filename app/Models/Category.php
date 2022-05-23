<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\Translatable\HasTranslations;



class Category extends Model
{
    use HasFactory;
    use Translatable;
 
 protected $guarded =[];


   //  protected $fillable= [
   //      'name'
   //  ];// end of fillable

    public $translatedAttributes = ['name'];
    
    protected $hidden = [
       ''
    ];// end of hidden

    protected function products(){

            return $this->hasMany(Product::class);

    }// end of relation





}//end of model
