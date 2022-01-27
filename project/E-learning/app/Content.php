<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
   
// It is use for SoftDeletes 1
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{   
    // It is use for SoftDeletes 2
     use SoftDeletes;

      // Relation with Category & Content  start
    public function categories()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
     // Relation with Category & Content  end

    // Relation with SubCategory &  Content  start
    public function sub_categories()
    {
        return $this->belongsTo('App\SubCategory','subCategory_id','id');
    }
    // Relation with SubCategory &  Content  end
}
