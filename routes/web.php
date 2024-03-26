<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    
    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts')->name('featured.products');

    Route::get('/search','searchProducts')->name('search');
    
});

Route::middleware(['auth'])->group(function (){

    Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::get('/orders', [App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('/orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class,'show']);
});

Route::get('/thank-you',[App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class,'index'])->name('admin.setting');

    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class,'store'])->name('admin.settings');

    // Sliders Routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });

    // Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category/add', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    // Products Routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete','destroy');
        Route::get('/products-image/{product_image_id}/delete','destroyImage');

        Route::post('/products-color/{prod_color_id}','updateProdColorQty');
        Route::get('/products-color/{prod_color_id}/delete','deleteProdColor');
    });

    // Brabds Routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    // Colors Routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}/update', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });

    // Orders Routes
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
        Route::get('invoice/{orderId}', 'viewInvoice');
        Route::get('invoice/{orderId}/generate', 'generateInvoice');
    });


    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index')->name('view.users');
        Route::get('/users/create', 'create')->name('create.user');
        Route::post('/users/create', 'store')->name('store.user');
        Route::get('/users/{user_id}/edit', 'edit')->name('edit.user');
        Route::put('users/{user_id}/update', 'update')->name('update.user');
        Route::get('/users/{user_id}/delete', 'destroy')->name('delete.user');

    });

});
