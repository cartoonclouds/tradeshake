<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});


// Nuxt::route('/{path?}')->where('path', '.*')->name('nuxt');


// ...
// Add this route last as a catch all for undefined routes.
// Route::get(
//     '/{path?}',
//     function (Request $request) {
//         // ...
//         // If the request expects JSON, it means that
//         // someone sent a request to an invalid route.
//         if ($request->expectsJson()) {
//             abort(404);
//         }

//         // Fetch and display the page from the render path on nuxt dev server or fallback to static file
//         return file_get_contents(env('NUXT_OUTPUT_PATH', public_path('spa.html')));
//     }
// )->where('path', '.*')
//     // Redirect to Nuxt from within Laravel
//     // by using Laravels route helper
//     // e.g.: `route('nuxt', ['path' => '/<nuxtPath>'])`
//     ->name('nuxt');
