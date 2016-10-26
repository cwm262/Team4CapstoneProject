<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class recipe_ingredient extends Model
{
    protected $table = 'recipe_ingredients';
    public $timestamps = false; // Turn off date

    public function item() {
        return $this->belongsTo('pantryApp\Item', 'item_id', 'item_id');
    }
}