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
    Route::get('items/barcode/{barcode}', ['as' => 'items.show', 'uses' => 'ItemController@show']);
    Route::resource('items', 'ItemController', ['except' => ['index', 'show']]);

    /*INVENTORY ROUTES*/
    Route::get('inventory/{user_id}/{item_id}', ['as' => 'inventory.show', 'uses' => 'InventoryController@show']);
    Route::get('inventory/{user_id}', ['as' => 'inventory.index', 'uses' => 'InventoryController@index']);
    Route::put('inventory/{id}', ['as' => 'inventory.update', 'uses' => 'InventoryController@update']);
    Route::resource('inventory', 'InventoryController', ['except' => ['index', 'show', 'update']]);
    /*END INVENTORY ROUTES*/
      
   /* RECIPE ROUTES */
    Route::get('recipes/{user_id}', ['as' => 'recipes.index', 'uses' => 'RecipeController@index']);
    Route::delete('recipes/{recipe_id}', ['as' => 'recipes.index', 'uses' => 'RecipeController@destroy']);
    Route::put('recipes/{recipe_id}', ['as' => 'recipes.update', 'uses' => 'RecipeController@update']);
    Route::put('recipes/made/{id}', ['as' => 'recipes.updateMade', 'uses' => 'RecipeController@updateMade']);
    Route::get('recipes/find/{recipe_id}', ['as' => 'recipes.show', 'uses' => 'RecipeController@show']);
    Route::put('recipes/rating/{id}', ['as' => 'recipes.updateRating', 'uses' => 'RecipeController@updateRating']);
    Route::resource('recipes', 'RecipeController', ['except' => ['index', 'destroy', 'update', 'show']]);
    /* END RECIPE ROUTES */

    /* SMART SHOPPING LIST ROUTES */
    Route::get('SmartShoppingList/{user_id}', ['as' => 'SmartShoppingList.index', 'uses' => 'SmartShoppingListController@index']);
    Route::get('SmartShoppingList/{user_id}/{date_range}', ['as' => 'SmartShoppingList.index', 'uses' => 'SmartShoppingListController@index']);
    Route::get('SmartShoppingList/{user_id}/{date_range}/{num_days}', ['as' => 'SmartShoppingList.index', 'uses' => 'SmartShoppingListController@index']);
    /* END SMART SHOPPING LIST ROUTES */ 

    /*DUMB SHOPPING LIST ROUTES */
    Route::get('DumbShoppingList/{user_id}', ['as' => 'ShoppingList.getList', 'uses' => 'ShoppingListController@getList']);
    Route::post('DumbShoppingList', ['as' => 'ShoppingList.updateList', 'uses' => 'ShoppingListController@updateList']);
    Route::delete('DumbShoppingList/{user_id}', ['as' => 'ShoppingList.deleteList', 'uses' => 'ShoppingListController@deleteList']);
   /*END SHOPPING LIST ROUTES*/

    /*NOTIFICATION ROUTES*/
    Route::get('notifications/recipes/{user_id}', ['as' => 'notifications.recipes', 'uses' => 'NotificationController@recipes']);
    Route::get('notifications/urgent/{user_id}', ['as' => 'notifications.urgent', 'uses' => 'NotificationController@urgent']);
    Route::get('notifications/ignore/{id}', ['as' => 'notifications.ignore', 'uses'=> 'NotificationController@ignore']);
    Route::get('notifications/expired/{user_id}', ['as' => 'notifications.expired', 'uses'=> 'NotificationController@expired']);
    /*END ROUTES*/

    /*EMAILS*/
    Route::post('email/send', ['as' => 'email.send', 'uses' => 'EmailController@send']);
    Route::post('email/smartSend', ['as' => 'email.smartSend', 'uses' => 'EmailController@smartSend']);
    /*END EMAIL ROUTES*/

    Route::get('stats/{user_id}', ['as' => 'stats.index', 'uses' => 'StatsController@index']);

});

Route::get('SmartShoppingList/{user_id}', ['as' => 'SmartShoppingList.index', 'uses' => 'SmartShoppingListController@index']);


    

 
