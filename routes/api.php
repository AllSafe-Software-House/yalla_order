<?php

use App\Http\Controllers\AddAddressController;
use App\Http\Controllers\Auth\AuthSocialtyController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentUSController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\MenuesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentOperationController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\ReservationesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Authinaction

Route::post('/register', [AuthUserController::class, 'register']);
Route::post('/login', [AuthUserController::class, 'login']);
// soical google
Route::get('/login/google', [AuthSocialtyController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthSocialtyController::class, 'handleGoogleCallback']);

// forget password
Route::post('/forgetpassword', [AuthUserController::class, 'forgetpassword']);
Route::post('/passwordreset', [EmailVerificationNotificationController::class, 'passwordreset']);


Route::middleware(['auth:sanctum'])->group(function () {
    // user
    Route::prefix('user')->group(function () {
        Route::get('show/profile', [AuthUserController::class, 'showprofile']);
        Route::post('edit/profile', [AuthUserController::class, 'editprofile']);
        Route::post('/add/address', [AddAddressController::class, 'addaddress']);
        Route::get('/logout', [AuthUserController::class, 'logout']);
    });
    Route::prefix('places')->group(function () {
        Route::post('/search/name', [PlacesController::class, 'searchres']);
        Route::post('/search/location', [PlacesController::class, 'searchlocation']);
        Route::post('/NearMe', [PlacesController::class, 'findPropertiesNearMe']);
        Route::get('/listfavproduct', [FavoritesController::class, 'listfav']);
        // restaurant
        Route::prefix('restaurantes')->group(function () {
            Route::get('/list', [PlacesController::class, 'show']);
            Route::get('/show/details/{id}', [PlacesController::class, 'showresdetails']);
            // menu
            Route::prefix('menue')->group(function () {
                Route::get('/list/{id}', [MenuesController::class, 'show']);
                Route::get('/listbyfilter/{id}/{categid}', [MenuesController::class, 'showbyfilter']);
                Route::get('/listbyselling/{id}', [MenuesController::class, 'showbestselling']);
                Route::post('/add/favproduct/{id}', [FavoritesController::class, 'addfav']);
                Route::get('show/details/choose/order/{place_id}/{product_id}', [OrderController::class, 'showdetails']);
            });
            // order
            Route::prefix('order')->group(function () {
                Route::post('/store', [OrderController::class, 'AddToCard']);
                Route::get('/show', [OrderController::class, 'showCard']);
                Route::post('/confirm/{id}', [OrderController::class, 'confirmorder']);
                Route::get('/myorder', [OrderController::class, 'myorder']);
                Route::get('/delete/{id}', [OrderController::class, 'deleteOrder']);
                Route::get('/trackorder/{id}', [OrderController::class, 'trackorder']);
                Route::get('/summary/{id}', [OrderController::class, 'summary']);


            });
            // rate
            Route::prefix('rate')->group(function () {
                Route::post('/add', [ReviewsController::class, 'addrate']);
                Route::get('/show/{id}', [ReviewsController::class, 'showrate']);
            });
        });
        // clinic
        Route::prefix('clinic')->group(function () {
            Route::get('/list/{category_id}', [PlacesController::class, 'index_clinic']);
            Route::get('/show/details/{id}', [PlacesController::class, 'showclinicdetails']);
            // menu
            Route::prefix('doctor')->group(function () {
                Route::get('/list/{id}', [DoctoresController::class, 'show']);
                Route::post('/add/favdoctor/{id}', [FavoritesController::class, 'addfavdoctore']);
                Route::post('/reservation', [ReservationesController::class, 'store']);
                Route::get('/summary/reservation/{id}', [ReservationesController::class, 'summaryReservatin']);
                Route::get('/confirm/reservation/{id}', [ReservationesController::class, 'confirmresevation']);
                Route::post('/getcode', [ReservationesController::class, 'calccode']);
                Route::get('/discount', [DoctoresController::class, 'listdiscount']);
            });
            // rate
            Route::prefix('rate')->group(function () {
                Route::post('/add', [ReviewsController::class, 'addratedoctor']);
                Route::get('/show/{id}', [ReviewsController::class, 'showratedoctor']);
            });
        });
    });
    // category
    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'show']);
        Route::get('/clinic/list', [CategoryController::class, 'showclinic']);
        Route::get('show/bycategory/{id}', [MenuesController::class, 'showbycategory']);
        Route::get('show/clinic/bycategory/{id}', [MenuesController::class, 'showclinicbycategory']);

    });
    // product
    Route::prefix('products')->group(function () {
        Route::get('/list', [ProductsController::class, 'show']);
        Route::get('/listdiscount', [ProductsController::class, 'productdiscount']);
    });
    // setting
    Route::prefix('setting')->group(function () {
        Route::get('/aboutus', [SettingController::class, 'aboutus']);
    });

    // promocode list
    Route::prefix('promocode')->group(function () {
        Route::get('/list', [PromocodeController::class, 'promocode']);
        Route::get('/listpromoclinic', [PromocodeController::class, 'promocodeclinic']);
        Route::get('/storefor/user/{id}', [PromocodeController::class, 'storepromocode']);
    });

    // contact us
    Route::prefix('contactus')->group(function () {
        Route::post('/', [ContentUSController::class, 'contactus']);
    });

    


});

    
