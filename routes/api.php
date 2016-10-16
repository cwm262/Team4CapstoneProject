<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function()
{
    Route::get('items/{user_id}', ['as' => 'items.index', 'uses' => 'ItemController@index']);
    Route::resource('items', 'ItemController', ['except' => ['index']]);
});

    
Route::get('recipes/{user_id}', ['as' => 'recipes.index', 'uses' => 'RecipeController@index']);
Route::resource('recipes', 'RecipeController', ['except' => ['index']]);

Route::get('inventory/{user_id}/{item_id}', ['as' => 'inventory.show', 'uses' => 'InventoryController@show']);
Route::get('inventory/{user_id}', ['as' => 'inventory.index', 'uses' => 'InventoryController@index']);
Route::put('inventory/{id}', ['as' => 'inventory.update', 'uses' => 'InventoryController@update']);
Route::resource('inventory', 'InventoryController', ['except' => ['index', 'show', 'update']]);
