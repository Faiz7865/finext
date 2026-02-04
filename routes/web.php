<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/fintech-software-development', function () {
    return view('fintech-software-development');
})->name('fintech-software-development');

Route::get('/lead', [LeadController::class, 'show'])->name('lead');
Route::post('/lead/submit', [LeadController::class, 'submit'])->name('lead.submit');

Route::get('/aeps-admin-software', function () {
    return view('aeps-admin-software');
})->name('aeps-admin-software');

Route::get('/recharge-admin-software', function () {
    return view('recharge-admin-software');
})->name('recharge-admin-software');

Route::get('/ecommerce-software', function () {
    return view('ecommerce-software');
})->name('ecommerce-software');

Route::get('/api-provider', function () {
    return view('api-provider');
})->name('api-provider')
;
Route::get('/pancard-admin-software', function () {
    return view('pancard-admin-software');
})->name('pancard-admin-software');

Route::get('/custom-web-development', function () {
    return view('custom-web-development');
})->name('custom-web-development');

Route::get('/mobile-app-development', function () {
    return view('mobile-app-development');
})->name('mobile-app-development');

Route::get('/ui-ux-design', function () {
    return view('ui-ux-design');
})->name('ui-ux-design');
