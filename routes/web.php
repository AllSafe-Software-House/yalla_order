<?php

use App\Http\Livewire\Notifications;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderTrakeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Dashboard\ContactusController;
use App\Http\Controllers\Dashboard\OrderListController;
use App\Http\Controllers\Dashboard\SizeAdminController;
use App\Http\Controllers\Dashboard\MenusAdminController;
use App\Http\Controllers\Dashboard\PlacesAdminController;
use App\Http\Controllers\Dashboard\AddtionAdminController;
use App\Http\Controllers\Dashboard\ProductAdminController;
use App\Http\Controllers\Dashboard\SettingAdminController;
use App\Http\Controllers\Dashboard\CategoryAdminController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\CashbackSettingController;
use App\Http\Controllers\Dashboard\IconsLinksAdminController;
use App\Http\Controllers\Dashboard\ReservationLidtController;
use App\Http\Controllers\Dashboard\PromoCodeControllerAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// landing page
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', [HomeController::class, 'landingPage'])->name('landingPage');
        Route::get('/doctors', [HomeController::class, 'doctorLandingPage'])->name('doctorLandingPage');
        Route::get('/become-partner', [HomeController::class, 'partenerForm'])->name('partenerForm');
        Route::get('/contact-us', [HomeController::class, 'contactUsForm'])->name('contactUsForm');
        Route::get('/CommenQuestion', [HomeController::class, 'CommenQuestionPage'])->name('CommenQuestionPage');
        Route::get('/Terms', [HomeController::class, 'TermsPage'])->name('TermsPage');
        Route::post('/contactus', [LandingPageController::class, 'contactus'])->name('contactus');
    });

// auth
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('registerstore');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/loginstore', [AuthenticatedSessionController::class, 'store'])->name('loginstore');

// partner.store
Route::post('/resturants-requests/store', [HomeController::class, 'store_resturants_requests'])->name('resturants-requests.store');
Route::post('/contact-us/store', [HomeController::class, 'store_contact_us'])->name('contact-us.store');
// routes dashboard
Route::middleware('auth')->group(function () {
    //logout
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // change password
    Route::get('change/password', [AuthAdminController::class, 'changepage'])->name('pagechangepassword');
    Route::post('save/change/password', [AuthAdminController::class, 'changepassword'])->name('changepasswordstore');
    // select Commission Percentage
    Route::get('select/commission', [SettingAdminController::class, 'selectcommission'])->name('selectcommission');
    Route::post('change/password/store', [SettingAdminController::class, 'commisionstore'])->name('commisionstore');
    Route::post('change/password/update', [SettingAdminController::class, 'commisionupdate'])->name('commisionupdate');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    // users
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('userslist')->middleware('permission:showUser');
        Route::get('/admin', [UsersController::class, 'indexadmin'])->name('adminlist')->middleware('permission:showUser');
        Route::get('/add', [UsersController::class, 'create'])->name('usersadd')->middleware('permission:addUser');
        Route::post('/store', [UsersController::class, 'store'])->name('usersstore')->middleware('permission:addUser');
        // Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('usersedit');
        // Route::post('/update/{id}', [UsersController::class, 'update'])->name('usersupdate');
        Route::get('/destory/{id}', [UsersController::class, 'destroy'])->name('usersdestory')->middleware('permission:deleteUser');
        Route::get('/user-transactions/{user_id}', [UsersController::class, 'userTransactions'])->name('userTransactions');
    });
    // roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('rolelist')->middleware('permission:showRole');
        Route::get('/add', [RolesController::class, 'create'])->name('roleadd')->middleware('permission:addRole');
        Route::post('/store', [RolesController::class, 'store'])->name('rolestore')->middleware('permission:addRole');
        Route::get('/show/{id}', [RolesController::class, 'show'])->name('roleshow')->middleware('permission:showRole');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('roleedit')->middleware('permission:editRole');
        Route::post('/update/{id}', [RolesController::class, 'update'])->name('roleupdate')->middleware('permission:editRole');
        Route::get('/destory/{id}', [RolesController::class, 'destroy'])->name('roledestory')->middleware('permission:deleteRole');
    });
    Route::prefix('places')->group(function () {
        Route::get('/change/status/page/{id}',[PlacesAdminController::class, 'changestatuspage'])->name('change_statuspage')->middleware('permission:ChangeStatus');
        Route::post('/change/status',[PlacesAdminController::class, 'changestatus'])->name('change_status')->middleware('permission:ChangeStatus');
        Route::post('filter/places', [PlacesAdminController::class, 'filter'])->name('filterplaces');
        // resturant
        Route::prefix('resturant')->group(function () {
            Route::get('/', [PlacesAdminController::class, 'index'])->name('resturantlist')->middleware('permission:showResturant');
            Route::get('/resturant-transactions/{id}', [PlacesAdminController::class, 'resturantTransactions'])->name('resturantTransactions');
            Route::get('/resturants-requests', [PlacesAdminController::class, 'resturant_request'])->name('resturantRequest')->middleware('permission:showResturant');
            Route::delete('/resturants-requests/{id}/delete', [PlacesAdminController::class, 'destroy_resturant_request'])->name('resturant_request.destroy');
            Route::get('/add', [PlacesAdminController::class, 'create'])->name('resturantadd')->middleware('permission:addResturant');
            Route::prefix('Menu')->group(function () {
                Route::get('/{id}', [MenusAdminController::class, 'index'])->name('menulist')->middleware('permission:showMenu');
                Route::get('/add/{id}', [MenusAdminController::class, 'create'])->name('menuadd')->middleware('permission:addMenu');
                Route::post('/store', [MenusAdminController::class, 'store'])->name('menustore')->middleware('permission:addMenu');
                Route::get('/edit/{id}', [MenusAdminController::class, 'edit'])->name('menuedit')->middleware('permission:editMenu');
                Route::post('/update/{id}', [MenusAdminController::class, 'update'])->name('menuupdate')->middleware('permission:editMenu');
                Route::get('/destory/{id}', [MenusAdminController::class, 'destroy'])->name('menudestory')->middleware('permission:deleteMenu');
            });
        });

        // clinic
        Route::prefix('clinic')->group(function () {
            Route::get('/', [PlacesAdminController::class, 'index_clinic'])->name('cliniclist')->middleware('permission:showClinic');
            Route::get('/clinic-transactions/{id}', [PlacesAdminController::class, 'clinicTransactions'])->name('clinicTransactions');
            Route::get('/add', [PlacesAdminController::class, 'create_clinic'])->name('clinicadd')->middleware('permission:addClinic');
            Route::prefix('doctor')->group(function () {
                Route::get('/{id}', [DoctorController::class, 'index'])->name('doctorlist')->middleware('permission:showDoctor');
                Route::get('/add/{id}', [DoctorController::class, 'create'])->name('doctoradd')->middleware('permission:addDoctor');
                Route::post('/store', [DoctorController::class, 'store'])->name('doctorstore')->middleware('permission:addDoctor');
                Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('doctoredit')->middleware('permission:editDoctor');
                Route::post('/update/{id}', [DoctorController::class, 'update'])->name('doctorupdate')->middleware('permission:editDoctor');
                Route::get('/destory/{id}', [DoctorController::class, 'destroy'])->name('doctordestory')->middleware('permission:deleteDoctor');
            });
        });
        Route::post('/store', [PlacesAdminController::class, 'store'])->name('store')->middleware(['permission:addClinic|addResturant']);
        Route::get('/edit/{id}', [PlacesAdminController::class, 'edit'])->name('edit')->middleware('permission:editClinic|editResturant');
        Route::post('/update/{id}', [PlacesAdminController::class, 'update'])->name('update')->middleware('permission:editClinic|editResturant');
        Route::get('/destory/{id}', [PlacesAdminController::class, 'destroy'])->name('destory')->middleware('permission:deleteClinic|deleteResturant');
    });

    // category
    Route::prefix('Category')->group(function () {
        // category resturant
        Route::prefix('resturant')->group(function () {
            Route::get('/', [CategoryAdminController::class, 'index'])->name('categorylist')->middleware('permission:showCategory');
            Route::get('/add', [CategoryAdminController::class, 'create'])->name('categoryadd')->middleware('permission:addCategory');
        });
        // category clinic
        Route::prefix('clinic')->group(function () {
            Route::get('/', [CategoryAdminController::class, 'index_clinic'])->name('categorycliniclist')->middleware('permission:showClinicCategory');
            Route::get('/add', [CategoryAdminController::class, 'create_clinic'])->name('categoryclinicadd')->middleware('permission:addClinicCategory');
        });
        Route::post('filter/category', [CategoryAdminController::class, 'filter'])->name('filtercategory');
        Route::post('/store', [CategoryAdminController::class, 'store'])->name('categorystore')->middleware('permission:addCategory|addClinicCategory');
        Route::get('/edit/{id}', [CategoryAdminController::class, 'edit'])->name('categoryedit')->middleware('permission:editCategory|editClinicCategory');
        Route::post('/update/{id}', [CategoryAdminController::class, 'update'])->name('categoryupdate')->middleware('permission:editCategory|editClinicCategory');
        Route::get('/destory/{id}', [CategoryAdminController::class, 'destroy'])->name('categorydestory')->middleware('permission:deleteCategory|deleteClinicCategory');
    });

    // product
    Route::prefix('Product')->group(function () {
        Route::get('/', [ProductAdminController::class, 'index'])->name('productlist')->middleware('permission:showProduct');
        Route::get('/add', [ProductAdminController::class, 'create'])->name('productadd')->middleware('permission:addProduct');
        Route::post('/store', [ProductAdminController::class, 'store'])->name('productstore')->middleware('permission:showProduct');
        Route::get('/edit/{id}', [ProductAdminController::class, 'edit'])->name('productedit')->middleware('permission:editProduct');
        Route::post('/update/{id}', [ProductAdminController::class, 'update'])->name('productupdate')->middleware('permission:editProduct');
        Route::post('filter/product', [ProductAdminController::class, 'filter'])->name('filterationproduct');
        Route::get('/destory/{id}', [ProductAdminController::class, 'destroy'])->name('productdestory')->middleware('permission:deleteProduct');
        Route::prefix('addation')->group(function () {
            Route::get('/', [AddtionAdminController::class, 'index'])->name('addtionlist')->middleware('permission:showAddon');
            Route::get('/add', [AddtionAdminController::class, 'create'])->name('addtionadd')->middleware('permission:addAddon');
            Route::post('/store', [AddtionAdminController::class, 'store'])->name('addtionstore')->middleware('permission:addAddon');
            Route::get('/edit/{id}', [AddtionAdminController::class, 'edit'])->name('addtionedit')->middleware('permission:editAddon');
            Route::post('/update/{id}', [AddtionAdminController::class, 'update'])->name('addtionupdate')->middleware('permission:editAddon');
            Route::get('/destory/{id}', [AddtionAdminController::class, 'destroy'])->name('addtiondestory')->middleware('permission:deleteAddon');
        });
        Route::prefix('size')->group(function () {
            Route::get('/', [SizeAdminController::class, 'index'])->name('sizelist')->middleware('permission:showSize');
            Route::get('/add', [SizeAdminController::class, 'create'])->name('sizeadd')->middleware('permission:addSize');
            Route::post('/store', [SizeAdminController::class, 'store'])->name('sizestore')->middleware('permission:addSize');
            Route::get('/edit/{id}', [SizeAdminController::class, 'edit'])->name('sizeedit')->middleware('permission:editSize');
            Route::post('/update/{id}', [SizeAdminController::class, 'update'])->name('sizeupdate')->middleware('permission:editSize');
            Route::get('/destory/{id}', [SizeAdminController::class, 'destroy'])->name('sizedestory')->middleware('permission:deleteSize');
            Route::get('/products/{placeid}', [SizeAdminController::class, 'getProducts'])->name('getProducts');

        });
    });


    Route::get('/cashback-settings', [CashbackSettingController::class, 'index'])->name('cashback-settings.index');
    Route::put('/cashback-settings', [CashbackSettingController::class, 'update'])->name('cashback-settings.update');

    // setting
    Route::prefix('setting')->group(function () {
        Route::get('/aboutus', [SettingAdminController::class, 'aboutus'])->name('aboutus')->middleware('permission:updateAboutUS');
        Route::post('/aboutusstore', [SettingAdminController::class, 'aboutusstore'])->name('aboutusstore')->middleware('permission:updateAboutUS');
        Route::post('/aboutusupdate', [SettingAdminController::class, 'aboutusupdate'])->name('aboutusupdate')->middleware('permission:updateAboutUS');

        // general info
        Route::get('/generalinfo', [SettingAdminController::class, 'generalinfo'])->name('generalinfo');
        Route::post('/generalinfostore', [SettingAdminController::class, 'generalinfostore'])->name('generalinfostore');
        Route::post('/generalinfoupdate', [SettingAdminController::class, 'generalinfoupdate'])->name('generalinfoupdate');


        // ContactUs
        Route::prefix('contactus')->group(function () {
            Route::get('/list', [ContactusController::class, 'index'])->name('listcontactus')->middleware('permission:showContactUS');
            Route::get('/list/clinic', [ContactusController::class, 'indexclinic'])->name('listcliniccontactus')->middleware('permission:showContactUS');
            Route::get('/destore/{id}', [ContactUsController::class, 'destore'])->name('destorecontactus')->middleware('permission:deleteContactUS');
        });
    });


    // add promo code
    Route::prefix('promocode')->group(function () {
        Route::get('/list/order', [PromoCodeControllerAdminController::class, 'index'])->name('promocodelist')->middleware('permission:showPromoCode');
        Route::get('/list/clinic', [PromoCodeControllerAdminController::class, 'indexclinic'])->name('promocodelistclinic')->middleware('permission:showClinicPromoCode');
        Route::get('/add', [PromoCodeControllerAdminController::class, 'create'])->name('promocodeadd')->middleware('permission:addPromoCode|addPromoCode');
        Route::get('/add/clinic', [PromoCodeControllerAdminController::class, 'createclinic'])->name('promocodeaddclinic')->middleware('permission:addClinicPromoCode');
        Route::post('/store', [PromoCodeControllerAdminController::class, 'store'])->name('promocodestore')->middleware('permission:addPromoCode|addClinicPromoCode');
        Route::get('/edit/{id}', [PromoCodeControllerAdminController::class, 'edit'])->name('promocodeedit')->middleware('permission:editPromoCode|editClinicPromoCode');
        Route::post('/update/{id}', [PromoCodeControllerAdminController::class, 'update'])->name('promocodeupdate')->middleware('permission:editPromoCode|editClinicPromoCode');
        Route::get('/destory/{id}', [PromoCodeControllerAdminController::class, 'destroy'])->name('promocodedestory')->middleware('permission:deletePromoCode|deleteClinicPromoCode');
    });


    // trackprder
    Route::prefix('order')->group(function () {
        Route::get('list/transcation', [OrderListController::class, 'transaction'])->name('transactionlist')->middleware('permission:listTransaction');
        Route::get('delete/transcation/{id}', [OrderListController::class, 'transactiondelete'])->name('transactiondelete')->middleware('permission:deleteTransaction');
        Route::get('list/track', [OrderListController::class, 'index'])->name('ordertracklist')->middleware('permission:trackorder');
        Route::get('list', [OrderListController::class, 'listall'])->name('listorderall')->middleware('permission:showAllOrder');
        Route::get('trackconfirm/{order_id}', [OrderTrakeController::class, 'trackconfirm'])->name('trackconfirm')->middleware('permission:trackorder');
        Route::get('trackready/{order_id}', [OrderTrakeController::class, 'trackready'])->name('trackready')->middleware('permission:trackorder');
        Route::get('trackpiked/{order_id}', [OrderTrakeController::class, 'trackpiked'])->name('trackpiked')->middleware('permission:trackorder');
        Route::get('trackdelivery/{order_id}', [OrderTrakeController::class, 'trackdelivery'])->name('trackdelivery')->middleware('permission:trackorder');
        Route::get('reset/order/{id}', [OrderListController::class, 'reset'])->name('resetorder');
        Route::post('filter/transaction', [OrderListController::class, 'filter'])->name('filteration');
        Route::get('export', [OrderListController::class, 'export'])->name('export');
    });

    Route::get('/resetorder/{id}', [OrderListController::class, 'reset'])->name('resetorder')->middleware('permission:showAllOrder');


    // listreservation
    Route::prefix('reservation')->group(function () {
        Route::get('list', [ReservationLidtController::class, 'index'])->name('reservation')->middleware('permission:listReservation');
        Route::get('delete/{id}', [ReservationLidtController::class, 'destory'])->name('reservationdestory')->middleware('permission:deleteReservation');
    });


    // notifiction
    Route::prefix('notification')->group(function () {
        Route::get('/list', [Notifications::class, 'index'])->name('notificationlist');
    });


    Route::prefix('LandingPage')->group(function () {
        Route::get('/partone', [LandingPageController::class, 'partone'])->name('partone');
        Route::get('/partone/clinic', [LandingPageController::class, 'partoneclinic'])->name('partoneclinic');
        Route::get('/parttwo', [LandingPageController::class, 'parttwo'])->name('parttwo');
        Route::get('/parttwo/clinic', [LandingPageController::class, 'parttwoclinic'])->name('parttwoclinic');
        Route::get('/cardfood', [LandingPageController::class, 'cardfood'])->name('cardfood');
        Route::get('/cardclinic', [LandingPageController::class, 'cardclinic'])->name('cardclinic');
        Route::post('/partonestore', [LandingPageController::class, 'partonestore'])->name('partonestore');
        Route::post('/partoneupdate', [LandingPageController::class, 'partoneupdate'])->name('partoneupdate');
        Route::get('/partenerpartone', [LandingPageController::class, 'partenerpartone'])->name('partenerpartone');
        Route::prefix('resons')->group(function () {
            Route::get('/', [LandingPageController::class, 'index'])->name('resonlist');
            Route::get('/add', [LandingPageController::class, 'create'])->name('resonadd');
            Route::post('/store', [LandingPageController::class, 'storereson'])->name('resonstore');
            Route::get('/edit/{id}', [LandingPageController::class, 'edit'])->name('resonedit');
            Route::post('/update/{id}', [LandingPageController::class, 'updatereson'])->name('resonupdate');
            Route::get('/destory/{id}', [LandingPageController::class, 'destroy'])->name('resondestory');
        });
        Route::prefix('bestdoctor')->group(function () {
            Route::get('/', [LandingPageController::class, 'bestdoctore'])->name('bestdoctorlist');
            Route::get('/add', [LandingPageController::class, 'bestdoctoradd'])->name('bestdoctoradd');
            Route::post('/store', [LandingPageController::class, 'bestdoctorestore'])->name('bestdoctorestore');
            Route::get('/edit/{id}', [LandingPageController::class, 'bestdoctoredit'])->name('bestdoctoredit');
            Route::post('/update/{id}', [LandingPageController::class, 'bestdoctorupdate'])->name('bestdoctorupdate');
            Route::get('/destory/{id}', [LandingPageController::class, 'bestdoctordestory'])->name('bestdoctordestory');
        });
        Route::prefix('resons/work/together')->group(function () {
            Route::get('/', [LandingPageController::class, 'indexsteps'])->name('resonsteplist');
            Route::get('/add', [LandingPageController::class, 'createstep'])->name('resonstepadd');
            Route::post('/store', [LandingPageController::class, 'storereson'])->name('resonstore');
            Route::get('/edit/{id}', [LandingPageController::class, 'edit'])->name('resonedit');
            Route::post('/update/{id}', [LandingPageController::class, 'updatereson'])->name('resonupdate');
            Route::get('/destory/{id}', [LandingPageController::class, 'destroy'])->name('resondestory');
        });
    });

    // icons media
    Route::prefix('IconMedia')->group(function () {
        Route::get('/', [IconsLinksAdminController::class, 'index'])->name('iconmedialist');
        Route::get('/add', [IconsLinksAdminController::class, 'create'])->name('iconmediaadd');
        Route::post('/store', [IconsLinksAdminController::class, 'store'])->name('iconmediastore');
        Route::get('/edit/{id}', [IconsLinksAdminController::class, 'edit'])->name('iconmediaedit');
        Route::post('/update/{id}', [IconsLinksAdminController::class, 'update'])->name('iconmediaupdate');
        Route::get('/destory/{id}', [IconsLinksAdminController::class, 'destroy'])->name('iconmediadestory');
    });



});


// payment paymob
Route::prefix('payment')->group(function () {
    Route::get('/callback', [OrderController::class, 'callback']);
    Route::post('payment/sucess', [OrderController::class, 'sucess'])->name('sucess');
    Route::post('payment/fail', [OrderController::class, 'fail'])->name('fail');
});

// require __DIR__.'/auth.php';
