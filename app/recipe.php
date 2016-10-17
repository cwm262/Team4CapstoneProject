<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    //protected $table = 'recipe';

    public function ingredients() {
        return $this->hasMany('pantryApp\recipe_ingredient', 'recipe_id', 'recipe_id');
    }
}
