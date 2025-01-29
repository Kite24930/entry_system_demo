<?php

use App\Http\Controllers\EventIssueController;
use App\Http\Controllers\EventListController;
use App\Http\Controllers\EventRegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/admin/event/list', [EventListController::class, 'show'])->name('event.list');

Route::get('/admin/event/register', [EventRegisterController::class, 'show'])->name('event.register');
Route::post('/admin/event/register/store', [EventRegisterController::class, 'store'])->name('event.register.name');

Route::get('/admin/event/issue/{event_id}', [EventIssueController::class, 'show'])->name('event.issue');
