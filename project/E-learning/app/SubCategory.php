<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /* We want to relation subCategory with Category.
       Many subCategory has one Category . So needed to use belongsTo
       this model SubCategory So this SubCategory has one 'App\Category' .It is 1st parametre
        2nd parametre foreign_key  is   cat_id 
        3rd parametre SubCategory table id primary_key or local_key is  id

    */
    // Relation with Category & SubCategory  start
    public function categories()
    {
        return $this->belongsTo('App\Category','cat_id','id');
    }
    // Relation with Category & SubCategory  end


    // Relation with Sub Category &  Content  start
    public function contents()
    {
        return $this->hasMany('App\Content','subCategory_id','id');
    }
    // Relation with Sub Category & Content  end

}
