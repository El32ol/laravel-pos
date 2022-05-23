<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Product extends Model
{
    use HasFactory;
    use Translatable;
 
    protected $guarded =[];
    // protected $fillable= [
    //     'name','description'
    // ];// end of fillable

    public $translatedAttributes = ['name','description'];
    protected $appends = ['image_path','profit_percent'];

    protected function getImagePathAttribute()
    {
        return asset('upload/product_images/' . $this->image);
    }  //end of get image

    protected function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return  number_format($profit_percent, 2) ;
    }  //end of get image
    
    protected $hidden = [
       ''
    ];// end of hidden

    public function category(){

            return $this->belongsTo(Category::class);

    }// end of relation
}
