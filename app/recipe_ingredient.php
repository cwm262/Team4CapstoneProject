<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class recipe_ingredient extends Model
{
    protected $table = 'recipe_ingredient';

/*
    public function item()
    {
        return $this->belongsTo('pantryApp\Item', 'item_id', 'item_id');
    }
*/
}
