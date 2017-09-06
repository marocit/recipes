<?php



Auth::routes();

Route::group(['middleware' => ['auth']], function() {
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('home/recipes/{slug}', 'HomeController@show')->name('home.show');

   Route::get('home/tags/{id}', 'HomeController@tag')->name('single.tag');
});



Route::group(['prefix' => '/account', 'middleware' => ['auth'], 'namespace' => 'Account'], function() {
    Route::get('/', 'AccountController@index')->name('account');
});

Route::group(['prefix' => '/recipes', 'middleware' => ['auth'], 'namespace' => 'Account' ], function() {
   Route::get('/', 'RecipeController@index')->name('account.recipes.index');
   Route::get('/{recipe}/edit', 'RecipeController@edit')->name('account.recipes.edit');
   Route::patch('/edit/{recipe}', 'RecipeController@update')->name('account.recipes.update');
   Route::get('/create', 'RecipeController@create')->name('account.recipes.create.start');
   Route::post('/', 'RecipeController@store')->name('account.recipes.store');
   Route::patch('category/{test}/edit', 'RecipeController@CategoryUpdate')->name('recipes.category.update');
   Route::patch('tag/{id}/edit', 'RecipeController@TagUpdate')->name('recipes.tag.update');


   //Tags
   Route::get('/tag', 'TagController@index')->name('account.tag.index');
   Route::get('/tag/create', 'TagController@create')->name('account.tag.create');
   Route::post('/tag', 'TagController@store')->name('account.tag.store');
   Route::get('/tag/{tag}/edit', 'TagController@edit')->name('account.tag.edit');
   Route::patch('tag/edit/{tag}', 'TagController@update')->name('account.tag.update');
   Route::delete('tag/delete/{id}', 'TagController@destroy')->name('account.tag.delete');

   // Categories
   Route::get('/category', 'CategoryController@index')->name('account.category.index');
   Route::get('/category/create', 'CategoryController@create')->name('account.category.create');
   Route::post('/category', 'CategoryController@store')->name('account.category.store');
   Route::get('/category/{category}/edit', 'CategoryController@edit')->name('account.category.edit');
   Route::patch('category/edit/{category}', 'CategoryController@update')->name('account.category.update');
});

Route::post('/upload/{recipe}', 'Upload\UploadController@store')->name('upload.store');

Route::post('/ingredientstore', 'Account\RecipeController@addIngredient')->name('add.ingredient');
Route::get('/fetchingredients/{id}', 'Account\RecipeController@fetchIngredients')->name('ingredient.fetch');

Route::get('/fetchcategories', 'Account\RecipeController@fetchCategories')->name('categories.fetch');


