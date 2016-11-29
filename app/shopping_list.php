<?php

namespace pantryApp;

use Illuminate\Database\Eloquent\Model;

class shopping_list extends Model
{
    protected $table = 'shopping_list';

    /**
     * Get the item associated with an inventory row
     */
    public function item()
    {
        return $this->belongsTo('pantryApp\Item', 'item_id', 'item_id');
    }
}
