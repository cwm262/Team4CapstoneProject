<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    //protected $table = 'recipe';

    public function ingredients() {
        return $this->hasMany('pantryApp\recipe_ingredient', 'recipe_id', 'recipe_id');
    }

    public function rating() {
        return $this->hasOne('pantryApp\recipe_rating', 'recipe_id', 'recipe_id')->where('user_id', $this->user_id);
    }
}
