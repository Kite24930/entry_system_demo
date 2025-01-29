<?php

use App\Http\Controllers\EntryAlreadyController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\EntryQrcodeController;
use App\Http\Controllers\EntryRegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventIssueController;
use App\Http\Controllers\EventListController;
use App\Http\Controllers\EventRegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/event/list', [EventListController::class, 'show'])->name('event.list');
    Route::get('/admin/event/detail/{event_id}', [EventListController::class, 'detail'])->name('event.detail');

    Route::get('/admin/event/register', [EventRegisterController::class, 'show'])->name('event.register');
    Route::post('/admin/event/register/store', [EventRegisterController::class, 'store'])->name('event.register.store');

    Route::get('/admin/event/issue/{event_id}', [EventIssueController::class, 'show'])->name('event.issue');

    Route::get('/entry', [EntryController::class, 'show'])->name('entry');

    Route::get('/entry/registration/{event_id}', [EntryRegistrationController::class, 'show'])->name('registration');
    Route::post('/entry/registration/store/{event_id}', [EntryRegistrationController::class, 'store'])->name('registration.store');

    Route::get('/entry/admission/qr_code/', [EntryQrcodeController::class, 'show'])->name('admission');
    Route::post('/entry/admission', [EntryQrcodeController::class, 'check'])->name('admission.check');
    Route::post('/entry/admission/success', [EntryQrcodeController::class, 'store'])->name('admission.store');

    Route::get('/entry/admission/already/{event_id}', [EntryAlreadyController::class, 'show'])->name('admission.already');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
