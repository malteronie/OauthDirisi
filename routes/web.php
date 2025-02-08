<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard/clients', function(Request $request) {
    return view('clients', [
        'clients' => $request->user()->clients
    ]);
})->middleware(['auth'])->name('dashboard.clients');

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::any('logout', function (){
    Auth::logout();
    return to_route('home');
    
})->name(name:'logout');

