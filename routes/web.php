<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CheckoutController;

// Dashboard
use App\Http\Controllers\Dashboard\HallController;
use App\Http\Controllers\Dashboard\TimeController;
use App\Http\Controllers\Dashboard\AdditionController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\ShowController as ShowDashboard;
use App\Http\Controllers\Dashboard\MovieController as MovieDashboard;
use App\Http\Controllers\Dashboard\CinemaController as CinemaDashboard ;
use App\Http\Controllers\Dashboard\RequestController as RequestDashboard ;
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

Route::get('/', function () {
    return redirect(route('home'));
});
Route::prefix('dashboard')->middleware('auth')->group(function () {
    
    Route::get(
        '/',
        [HomeController::class, 'dashboard']
    )->name('dashboard');
    
//    Admin
    Route::group(['middleware' => ['role:admin']], function () {

    
    Route::get(
        '/categories',
        [CategoryController::class, 'index']
    )->name('categories.index');

    Route::get(
        '/categories/create',
        [CategoryController::class, 'create']
    )->name('categories.create');

    Route::post(
        '/categories/store',
        [CategoryController::class, 'store']
    )->name('categories.store');

    Route::get(
        '/categories/edit/{id}',
        [CategoryController::class, 'edit']
    )->name('categories.edit');

    Route::post(
        '/categories/update/{id}',
        [CategoryController::class, 'update']
    )->name('categories.update');

    Route::delete(
        '/categories/destroy/{id}',
        [CategoryController::class, 'destroy']
    )->name('categories.delete');

    Route::get(
        '/requests',
        [RequestDashboard::class, 'index']
    )->name('requests.index');
   
    Route::get(
        '/requests/{id}',
        [RequestDashboard::class, 'show']
    )->name('requests.show');

    Route::post(
        '/requests/aprove/{id}',
        [RequestDashboard::class, 'approve']
    )->name('requests.approve');


    Route::post(
        '/requests/cancel/{id}',
        [RequestDashboard::class, 'cancel']
    )->name('requests.cancel');

    Route::get(
        '/cinemas',
        [CinemaDashboard::class, 'index']
    )->name('cinemas.index');

    

    Route::get(
        '/cinemas/{id}',
        [CinemaDashboard::class, 'show']
    )->name('cinemas.show');

    Route::delete(
        '/cinemas/{id}',
        [CinemaDashboard::class, 'destroy']
    )->name('cinemas.destroy');

    });

//    Manager
    Route::group(['middleware' => ['role:manager']], function () {
        Route::get(
            '/movies',
            [MovieDashboard::class, 'index']
        )->name('movies.index');

        Route::get(
            '/movies/create',
            [MovieDashboard::class, 'create']
        )->name('movies.create');

        Route::post(
            '/movies/store',
            [MovieDashboard::class, 'store']
        )->name('movies.store');

        Route::get(
            '/movies/edit/{id}',
            [MovieDashboard::class, 'edit']
        )->name('movies.edit');

        Route::post(
            '/movies/update/{id}',
            [MovieDashboard::class, 'update']
        )->name('movies.update');

        Route::delete(
            '/movies/destroy/{id}',
            [MovieDashboard::class, 'destroy']
        )->name('movies.delete');


        Route::get(
            '/times',
            [TimeController::class, 'index']
        )->name('times.index');

        Route::get(
            '/times/create',
            [TimeController::class, 'create']
        )->name('times.create');

        Route::post(
            '/times/store',
            [TimeController::class, 'store']
        )->name('times.store');

        Route::get(
            '/times/edit/{id}',
            [TimeController::class, 'edit']
        )->name('times.edit');

        Route::post(
            '/times/update/{id}',
            [TimeController::class, 'update']
        )->name('times.update');

        Route::delete(
            '/times/destroy/{id}',
            [TimeController::class, 'destroy']
        )->name('times.delete');

        Route::get(
            '/halls',
            [HallController::class, 'index']
        )->name('halls.index');

        Route::get(
            '/halls/create',
            [HallController::class, 'create']
        )->name('halls.create');

        Route::post(
            '/halls/store',
            [HallController::class, 'store']
        )->name('halls.store');

        Route::get(
            '/halls/edit/{id}',
            [HallController::class, 'edit']
        )->name('halls.edit');

        Route::post(
            '/halls/update/{id}',
            [HallController::class, 'update']
        )->name('halls.update');

        Route::delete(
            '/halls/destroy/{id}',
            [HallController::class, 'destroy']
        )->name('halls.delete');
    //=============================
    Route::get(
        '/shows',
        [ShowDashboard::class, 'index']
    )->name('shows.index');

    Route::get(
        '/shows/today',
        [ShowDashboard::class, 'today']
    )->name('shows.today');

    Route::get(
        '/shows/today/{id}',
        [ShowDashboard::class, 'view']
    )->name('shows.today.view');

    Route::get(
        '/shows/create',
        [ShowDashboard::class, 'create']
    )->name('shows.create');

    Route::post(
        '/shows/store',
        [ShowDashboard::class, 'store']
    )->name('shows.store');
    
    Route::post(
        '/shows/pay/{id}',
        [ShowDashboard::class, 'pay']
    )->name('shows.pay');

    Route::post(
        '/shows/approve/{id}',
        [ShowDashboard::class, 'approve']
    )->name('shows.approve');

    Route::post(
        '/shows/charge/{id}',
        [ShowDashboard::class, 'charge']
    )->name('shows.charge');

    Route::get(
        '/shows/edit/{id}',
        [ShowDashboard::class, 'edit']
    )->name('shows.edit');

    Route::post(
        '/shows/update/{id}',
        [ShowDashboard::class, 'update']
    )->name('shows.update');

    Route::delete(
        '/shows/destroy/{id}',
        [ShowDashboard::class, 'destroy']
    )->name('shows.delete');

//=====================================
Route::get(
    '/additions',
    [AdditionController::class, 'index']
)->name('additions.index');

Route::get(
    '/additions/create',
    [AdditionController::class, 'create']
)->name('additions.create');

Route::post(
    '/additions/store',
    [AdditionController::class, 'store']
)->name('additions.store');

Route::get(
    '/additions/edit/{id}',
    [AdditionController::class, 'edit']
)->name('additions.edit');

Route::post(
    '/additions/update/{id}',
    [AdditionController::class, 'update']
)->name('additions.update');

Route::delete(
    '/additions/destroy/{id}',
    [AdditionController::class, 'destroy']
)->name('additions.delete');



    });


});

Auth::routes();

Route::get('/authentication', [AuthenticatedSessionController::class, 'auth'])
->name('auth');


// <---------------------------------- USER-------------------------------------------------------->
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get(
    '/cinemas',
    [CinemaController::class, 'index']
)->name('cinema.index');


Route::get(
    '/cinemas/{id}',
    [CinemaController::class, 'show']
)->name('cinema.show');

Route::get(
    '/movie/{id}',
    [MovieController::class, 'show']
)->name('movie.show');

Route::get(
    '/book/{id}',
    [ShowController::class, 'book']
)->name('show.book')->middleware('auth');

Route::post(
    '/seats/store/{id}',
    [SeatController::class, 'store']
)->name('seats.store');

Route::get(
    '/profile',
    [ProfileController::class, 'index']
)->name('profile.index')->middleware('auth');

Route::get(
    '/ticket/{id}',
    [TicketController::class, 'index']
)->name('ticket.index');

Route::post(
    '/ticket/{id}',
    [TicketController::class, 'cancel']
)->name('ticket.cancel');

Route::get(
    '/requests/new',
    [RequestController::class, 'create']
)->name('requests.new');

Route::post(
    '/requests/store',
    [RequestController::class, 'store']
)->name('requests.store');


Route::get(
    '/checkout',
    [CheckoutController::class, 'index']
)->name('checkout.index');

Route::post(
    '/checkout',
    [CheckoutController::class, 'store']
)->name('checkout.store');
