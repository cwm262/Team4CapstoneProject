<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $table = 'inventory';

    public function ingredients() {
        return $this->hasMany('pantryApp\recipe_ingredient', 'recipe_id', 'recipe_id');
    }
}
