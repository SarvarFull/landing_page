<?php

use App\Http\Controllers\Backend\CarouselController;
use App\Http\Controllers\Backend\HeadingController;
use App\Http\Controllers\Backend\IndexController as BackendIndexController;
use App\Http\Controllers\Backend\MainSectionController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\IndexController as FrontendIndexController;
use App\Http\Controllers\Frontend\RegisterController;
use Illuminate\Support\Facades\Route;




Route::get('/', [FrontendIndexController::class, 'mainPage'])->name('main.page');



//<--! Start Register Routes  -->//

Route::get('/register', [RegisterController::class, 'registerPage'])->name('register.page');
Route::post('/sign/up/user', [RegisterController::class, 'signUp'])->name('sign.up');
Route::post('/sign/in/user', [RegisterController::class, 'signIn'])->name('sign.in');
Route::get('/sign/out/user', [RegisterController::class, 'signOut'])->name('sign.out');

//<--! End Register Routes  -->//


//<--! Start Routes For Admin -->>//

Route::prefix('ceo')->group(function () {

    Route::get('/', [BackendIndexController::class, 'admin_register'])->name('admin.register.page');
    Route::post('/admin/sign/in', [BackendIndexController::class, 'admin_sign_in'])->name('admin.sign.in');
    Route::get('/admin/dashboard', [BackendIndexController::class, 'admin_dashboard'])->name('admin.dashboard');


    Route::prefix('carousel')->group(function () {
        Route::get('/view', [CarouselController::class, 'viewCarousel'])->name('view.carousel');
        Route::get('/store', [CarouselController::class, 'carouselStore'])->name('carousel.store');
        Route::post('/store', [CarouselController::class, 'addCarousel'])->name('add.carousel');
        Route::get('/edit/{id}', [CarouselController::class, 'editCarousel'])->name('edit.carousel');
        Route::post('/edit/{id}', [CarouselController::class, 'updateCarousel'])->name('update.carousel');
        Route::get('/delete/{id}', [CarouselController::class, 'deleteCarousel'])->name('delete.carousel');
    });

    Route::prefix('heading')->group(function () {
        Route::get('/view', [HeadingController::class, 'viewHeading'])->name('view.heading');
        Route::get('/store', [HeadingController::class, 'headingStore'])->name('heading.store'); 
        Route::post('/store', [HeadingController::class, 'addHeading'])->name('add.heading');
        Route::get('/edit/{id}', [HeadingController::class, 'editHeading'])->name('edit.heading');
        Route::post('/edit/{id}', [HeadingController::class, 'updateHeading'])->name('update.heading');
        Route::get('/delete/{id}', [HeadingController::class, 'deleteHeading'])->name('delete.heading');
    });

    Route::prefix('main_section')->group(function () {
        Route::get('/view', [MainSectionController::class, 'viewMainSection'])->name('view.main.section');
        Route::get('/store', [MainSectionController::class, 'mainSectionStore'])->name('main.section.store');
        Route::post('/store', [MainSectionController::class, 'addMainSection'])->name('add.main.section');
        Route::get('/edit/{id}', [MainSectionController::class, 'editMainSection'])->name('edit.main.section');
        Route::post('/edit/{id}', [MainSectionController::class, 'updateMainSection'])->name('update.main.section');
        Route::get('/delete/{id}', [MainSectionController::class, 'deleteMainSection'])->name('delete.main.section');
    });

    Route::prefix('subscribers')->group(function () {
        Route::get('/view', [SubscribersController::class, 'viewSubscribers'])->name('view.subscribers');
    });

    Route::prefix('users')->group(function () {
        Route::get('/view', [UsersController::class, 'viewUsers'])->name('view.users');
    });
});

//<--! End Routes For Admin -->>//
