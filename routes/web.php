<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\BookingController as DoctorBookingController;
use App\Http\Controllers\Doctor\ConsultationController as DoctorConsultationController;
use App\Http\Controllers\Member\HomeController;
use App\Http\Controllers\Member\DoctorController as MemberDoctorController;
use App\Http\Controllers\Member\BookingController as MemberBookingController;
use App\Http\Controllers\Member\ArticleController as MemberArticleController;
use App\Http\Controllers\Member\ConsultationController as MemberConsultationController;
use App\Http\Controllers\Member\ConsultationMessageController as MemberConsultationMessageController;
use App\Http\Controllers\Doctor\ConsultationMessageController as DoctorConsultationMessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('doctors', DoctorController::class);
        Route::resource('members', MemberController::class)
            ->parameters([
                'members' => 'member'
            ]);
        Route::resource('articles', ArticleController::class);
        Route::resource('bookings', BookingController::class);
        Route::resource('consultations', ConsultationController::class)
            ->only(['index', 'show', 'destroy']);
    });

Route::middleware(['auth', 'role:doctor'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [DoctorDashboardController::class, 'index']
        )
            ->name('dashboard');

        Route::resource('bookings', DoctorBookingController::class)
            ->only(['index', 'show']);

        Route::resource('consultations', DoctorConsultationController::class)
            ->only(['index', 'show']);

        Route::post(
            'consultations/{consultation}/messages',
            [DoctorConsultationMessageController::class, 'store']
        )->name('consultations.messages.store');

    });

Route::middleware(['auth', 'role:member'])
    ->prefix('member')
    ->name('member.')
    ->group(function () {

        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');

        Route::get('/doctors', [MemberDoctorController::class, 'index'])
            ->name('doctors.index');

        Route::get('/doctors/{doctor}', [MemberDoctorController::class, 'show'])
            ->name('doctors.show');

        Route::resource('articles', MemberArticleController::class)
            ->only(['index', 'show']);

        Route::resource('bookings', MemberBookingController::class);

        Route::resource('consultations', MemberConsultationController::class)
            ->only(['index', 'show']);

        Route::post(
            'consultations/{consultation}/messages',
            [MemberConsultationMessageController::class, 'store']
        )->name('consultations.messages.store');
    });
require __DIR__ . '/auth.php';