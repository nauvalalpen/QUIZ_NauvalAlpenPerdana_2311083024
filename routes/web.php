<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PaymentController;


Route::get('/', function () {
   return view('home');
})->name('home');




Route::get('/payment', [PaymentController::class, 'create'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');


Route::post('/payment/callback', [PaymentController::class, 'callback'])
   ->name('payment.callback');
Route::get('/payment/success/{orderId}', [PaymentController::class, 'success'])
   ->name('payment.success');


Route::post('/payment/ajax-callback', [PaymentController::class, 'callback'])
   ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]) // atau exclude CSRF di VerifyCsrfToken
   ->name('payment.ajax-callback');


Route::get('/payments/history', [PaymentController::class, 'history'])
   ->name('payment.history');


Route::get('/payments/{orderId}', [PaymentController::class, 'detail'])
   ->name('payment.detail');
