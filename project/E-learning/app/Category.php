<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    /* We want to relation Category with subCategory.
       One Category has many subCategory .
       this model Category So this Category has many 'App\SubCategory' .It is 1st parametre
        2nd parametre foreign_key is               cat_id 
        3rd parametre primary_key or localK_key is  id

    */
    public function subCategories()
    {
        return $this->hasMany('App\SubCategory','cat_id','id');
    }
}
