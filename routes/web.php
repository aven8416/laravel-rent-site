<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/range', function() {
    return view('front.range');
});
Route::post('addReview', [HomeController::class, 'addReview']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::get('selectSize', [HomeController::class, 'selectSize']);
Route::get('selectColor', [HomeController::class, 'selectColor']);

Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/products', [HomeController::class, 'shop']);
Route::get('/products/{id}', [HomeController::class, 'proCats']);
Route::get('/products/brand/{name}', [HomeController::class, 'proBrands']);

Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/search', [HomeController::class, 'search']);

Route::get('/newArrival', [HomeController::class, 'newArrival']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/cart/addItem/{id}', [CartController::class, 'addItem']);

Route::get('/cart/remove/{id}', [CartController::class, 'destroy']);
Route::get('/cart/update/{id}', [CartController::class, 'update']);

// logged in user pages
Route::group(['middleware' => 'auth'], function() {
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/formvalidate', [CheckoutController::class, 'formvalidate']);

    Route::post('/payment', [CheckoutController::class, 'payment']);

    Route::get('/profile', function() {
        return view('profile.index');
    });
    Route::get('/orders',  [ProfileController::class, 'orders']);
    Route::get('/orders/orderDetails/{id}', [ProfileController::class, 'view_order_details']);

    Route::get('/address', [ProfileController::class, 'address']);
    Route::post('/updateAddress',  [ProfileController::class, 'updateAddress']);

    Route::get('/password',  [ProfileController::class, 'Password']);
    Route::post('/updatePassword',  [ProfileController::class, 'updatePassword']);

    Route::get('/thankyou', function() {
        return view('profile.thankyou');
    });

    Route::get('/mail',  [HomeController::class, 'sendmail']);

});

//admin links
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/addProduct', [AdminController::class, 'addpro_form']);
    Route::post('/add_product', [AdminController::class, 'add_product']);
    Route::get('/products', [AdminController::class, 'view_products']);

    Route::get('/addCat', [AdminController::class, 'add_cat']);

    Route::Post('/catForm', [AdminController::class, 'catForm']);
    Route::get('/categories', [AdminController::class, 'view_cats']);
    Route::get('/CatEditForm/{id}', [AdminController::class, 'CatEditForm']);

    Route::post('/editCat', [AdminController::class, 'editCat']);

    Route::get('/addBrand', [AdminController::class, 'add_brand']);

    Route::Post('/brandForm', [AdminController::class, 'brandForm']);
    Route::get('/brands', [AdminController::class, 'view_brands']);
    Route::get('/BrandEditForm/{id}', [AdminController::class, 'BrandEditForm']);


    Route::get('/orders', [AdminController::class, 'view_orders']);
    Route::get('/orders/orderDetails/{id}', [AdminController::class, 'view_order_details']);
    Route::post('/orders/orderDetails/product/{id}', [AdminController::class, 'setStartDate']);
    Route::get('/orders/confirm/{id}', [AdminController::class, 'confirm_order']);
    Route::get('/orders/cancel/{id}', [AdminController::class, 'cancel_order']);
    Route::post('/orders/product_date/{id}/', [AdminController::class, 'date_product']);
    Route::get('/orders/product_returned/{id}/', [AdminController::class, 'product_returned']);
    Route::get('/orders/pending/', [AdminController::class, 'view_orders_pending']);
    Route::get('/orders/confirmed/', [AdminController::class, 'view_orders_confirmed']);
    Route::get('/orders/canceled', [AdminController::class, 'view_orders_canceled']);

    Route::post('/editBrand',  [AdminController::class, 'editBrand']);
    Route::get('ProductEditForm/{id}', [AdminController::class, 'ProductEditForm']);
    Route::post('editProduct',  [AdminController::class, 'editProduct']);
    Route::get('EditImage/{id}', [AdminController::class, 'ImageEditForm']);
    Route::post('editProImage', [AdminController::class, 'editProImage']);
    Route::get('deleteCat/{id}', [AdminController::class, 'deleteCat']);
    Route::get('deleteBrand/{id}', [AdminController::class, 'deleteBrand']);
    Route::get('deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
    Route::get('/addProperty/{id}', function($id){
        return view('admin.addProperty')->with('id', $id);
    });
    Route::get('/addPropertyAll', function(){
        return view('admin.addProperty');
    });
    Route::post('sumbitProperty',[AdminController::class, 'sumbitProperty']);
    Route::post('editProperty',[AdminController::class, 'editProperty']);
    Route::get('addSale', [AdminController::class, 'addSale']);

    Route::get('addAlt/{id}', [AdminController::class, 'addAlt']);
    Route::post('submitAlt',[AdminController::class, 'submitAlt']);
});

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);
Route::post('addToWishList', [HomeController::class, 'wishList']);
Route::get('/WishList', [HomeController::class, 'View_wishList']);
Route::get('/removeWishList/{id}', [HomeController::class, 'removeWishList']);
