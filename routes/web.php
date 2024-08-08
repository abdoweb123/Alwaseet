<?php

use App\Http\Controllers\Dash\MemberController;
use App\Http\Controllers\Dash\OrderController;
use App\Http\Controllers\Dash\WalletController;
use App\Livewire\WorkersLive;
use App\Models\Service;
use App\Livewire\AdminLive;
use App\Livewire\SlideLive;
use App\Livewire\UsersLive;
use App\Livewire\ContactLive;
use App\Livewire\ServicesLive;
use App\Livewire\HospitalsLive;
use App\Livewire\SpecialtyLive;
use App\Livewire\CategoriesLive;
use App\Http\Middleware\LocalMid;
use App\Livewire\AppointmentLive;
use App\Livewire\ContactusFrontLive;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\SliderLive;
use App\Livewire\Userarea\ServiceFLive;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Dash\HomeController;
use App\Http\Controllers\Dash\SettingController;
use App\Http\Controllers\Dash\AdminLoginController;

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

Route::prefix('/dashboard')->middleware(LocalMid::class)->as('dashboard.')->group(function(){

    Route::middleware('auth:admin')->group(function(){
        Route::get('/', [HomeController::class, 'index'])->name('home');

        //order
        Route::get('/new_order', [OrderController::class, 'new_order'])->name('new_order');
        Route::get('/edit-order/{id}', [OrderController::class, 'edit_order'])->name('edit_order');
        Route::PUT('/update-order/{id}', [OrderController::class, 'update'])->name('update_order');
        Route::post('/worker_data', [OrderController::class, 'worker_data'])->name('worker_data');
        Route::get('/show_order/{order_id}', [OrderController::class, 'show_order'])->name('order_show');

        //wallet
        Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
        Route::post('/wallet/store', [WalletController::class, 'store'])->name('wallet_store');
        Route::get('/wallet/transactions/{user}', [WalletController::class, 'transactions'])->name('wallet_transactions');

        // members
        Route::get('Membership-certificate/{user}', [MemberController::class,'membershipCertificate'])->name('membershipCertificate');

        Route::post('/user_data', [HomeController::class, 'user_data'])->name('user_data');
        Route::post('/service_price', [HomeController::class, 'service_price'])->name('service_price');

        Route::POST('/create_order', [OrderController::class, 'create_order'])->name('create_order');
        Route::get('admins', AdminLive::class)->name('admins');
        Route::get('members', UsersLive::class)->name('members');
        Route::get('categories', CategoriesLive::class)->name('categories');
        Route::get('services/{sub_category_id}', ServicesLive::class)->name('services');
        Route::get('contact_us', ContactLive::class)->name('contact_us');
        Route::get('public-setting', [SettingController::class, 'index'])->name('public_setting');
        Route::post('public-setting_post', [SettingController::class, 'store'])->name('public_setting_post');
        Route::get('slider', SliderLive::class)->name('slider');

        Route::get('workers', WorkersLive::class)->name('workers');

        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    });

    Route::get('login', [AdminLoginController::class, 'index'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post');
});

Route::middleware(LocalMid::class)->group(function(){
    Route::get('/', [FrontendController::class, 'home'])->name('home');
    Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
    Route::get('/categories/{category_id}/services', ServiceFLive::class)->name('services');
    Route::get('/categories/services/{service_id}', [FrontendController::class, 'services_show'])->name('services_show');
    Route::get('/services/{service_id}/guest', [FrontendController::class, 'guest'])->name('guest');
    Route::post('/services/guest', [FrontendController::class, 'guest_store'])->name('guest_store');
    Route::get('/about_us', [FrontendController::class, 'about_us'])->name('about_us');
    Route::get('/contact_us', [FrontendController::class, 'contact'])->name('contact_us');
    Route::post('/contact_us', [FrontendController::class, 'contact_store'])->name('contact_us_post');

    Route::get('login', [FrontendController::class, 'login_page'])->name('login_page');
    Route::post('login', [FrontendController::class, 'login'])->name('login');

    Route::middleware('auth', LocalMid::class)->group(function(){
        Route::get('profile', [FrontendController::class, 'profile'])->name('profile');
        Route::post('profile/change_pass', [FrontendController::class, 'change_pass'])->name('change_pass');
        Route::get('orders', [FrontendController::class, 'orders'])->name('old_orders');
        Route::post('logout', [FrontendController::class, 'logout'])->name('logout');

        Route::post('/services/user_store/{service_id}', [FrontendController::class, 'user_store'])->name('user_store');

    });
});




Route::get('language/{locale}', function($locale){
    if (isset($locale) && in_array($locale, ['ar','en'])) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('lang');

Route::any('artisan/{command}', function($command){
    Artisan::call($command);
    dd(Artisan::output());

})->name('artisan');
