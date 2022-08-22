<?php

use Illuminate\Support\Facades\Route;

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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('states')->name('states/')->group(static function() {
            Route::get('/',                                             'StatesController@index')->name('index');
            Route::get('/create',                                       'StatesController@create')->name('create');
            Route::post('/',                                            'StatesController@store')->name('store');
            Route::get('/{state}/edit',                                 'StatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{state}',                                     'StatesController@update')->name('update');
            Route::delete('/{state}',                                   'StatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tasks')->name('tasks/')->group(static function() {
            Route::get('/',                                             'TasksController@index')->name('index');
            Route::get('/create',                                       'TasksController@create')->name('create');
            Route::post('/',                                            'TasksController@store')->name('store');
            Route::get('/{task}/edit',                                  'TasksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TasksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{task}',                                      'TasksController@update')->name('update');
            Route::delete('/{task}',                                    'TasksController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detail-tasks')->name('detail-tasks/')->group(static function() {
            Route::get('/',                                             'DetailTasksController@index')->name('index');
            Route::get('/create',                                       'DetailTasksController@create')->name('create');
            Route::post('/',                                            'DetailTasksController@store')->name('store');
            Route::get('/{detailTask}/edit',                            'DetailTasksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetailTasksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detailTask}',                                'DetailTasksController@update')->name('update');
            Route::delete('/{detailTask}',                              'DetailTasksController@destroy')->name('destroy');
        });
    });
});