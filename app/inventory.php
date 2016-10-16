<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $table = 'inventory';

     /**
     * Get the item associated with an inventory row
     */
    /*public function item()
    {
        return $this->belongsTo('pantryApp\Item', 'item_id', 'item_id');
    }*/
}
