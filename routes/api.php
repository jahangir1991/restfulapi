<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::get('/cal/{weight}/{region}', function(Request $request) {

    $weight  = $request->weight;

    $region  = $request->region;

    $dimension  = $request->dimension;


    $min_range = 0;
    $max_range = 10;

    if( ($weight > $max_range ) && ($region == 1))
    {
        $weight = 80;

        $region = 100;

        return response()->json(['weightCharge' => $weight, 'regionCharge' => $region], 200);

    } elseif ( ($min_range < $weight) && ($weight < $max_range ) && ($range == 2) )
    {
        $weight = 60;

        $region = 200;

        return response()->json(['weightCharge' => $weight, 'regionCharge' => $region], 200);

    } else {
        return "Weight is out of range";
    }
});

/*
|--------------------------------------------------------------------------
| Buyers
|--------------------------------------------------------------------------
*/
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
Route::resource('buyers.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);
Route::resource('buyers.products', 'Buyer\BuyerProductController', ['only' => ['index']]);
Route::resource('buyers.sellers', 'Buyer\BuyerSellerController', ['only' => ['index']]);
Route::resource('buyers.categories', 'Buyer\BuyerCategoryController', ['only' => ['index']]);

/*
|--------------------------------------------------------------------------
| Sellers
|--------------------------------------------------------------------------
*/
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

/*
|--------------------------------------------------------------------------
| Categpries
|--------------------------------------------------------------------------
*/
Route::resource('categories', 'Category\CategoryController', ['except' => ['create']]);
Route::resource('categories.products', 'Category\CategoryProductController', ['only' => ['index']]);
Route::resource('categories.sellers', 'Category\CategorySellerController', ['only' => ['index']]);
Route::resource('categories.transactions', 'Category\CategoryTransactionController', ['only' => ['index']]);
Route::resource('categories.buyers', 'Category\CategoryBuyerController', ['only' => ['index']]);

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);


/*
|--------------------------------------------------------------------------
| Transactions
|--------------------------------------------------------------------------
*/
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);
Route::resource('transactions.categories', 'Transaction\TransactionCategoryController', ['only' => ['index']]);
Route::resource('transactions.sellers', 'Transaction\TransactionSellerController', ['only' => ['index']]);

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::resource('users', 'User\UserController');

/*
|--------------------------------------------------------------------------
| Buyers
|--------------------------------------------------------------------------
*/
// Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
