<?php



use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\AuthController;
use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PaypalController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\SlideController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    // Auth::routes();

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/offer', [HomeController::class, 'offers'])->name('offers');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product-details/{id}', [ProductController::class, 'getProsuctDetails'])->name('product.details');


    Route::get('/search', [ProductController::class, 'search'])->name('search');

    Route::post('/send', [HomeController::class, 'sendMail'])->name('send.email');
    Route::get('/contact', [HomeController::class, 'contactUs'])->name('contact');
    Route::post('/news-letters', [HomeController::class, 'newsLetters'])->name('news-letters');

    // add cart and checkout
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/update-all', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkoutPage'])->name('checkout.index');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

    //paypal
    Route::get('/paypal/pay', [PaypalController::class, 'payWithPayPal'])->name('paypal.pay');
    Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
    Route::post('/paypal/success', [PaypalController::class, 'handlePaypalSuccess']);











    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
