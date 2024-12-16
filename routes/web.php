<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrainingEventController;
use App\Http\Controllers\UserController\UserEventController;
use App\Http\Controllers\UserController\PaymentHistoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AllStudentController;
use App\Http\Controllers\Admin\PaymentHisController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('login', [RegisterController::class, 'login']);
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/eventtraning/{id}', [TrainingEventController::class, 'index'])->name('eventtraning');
        Route::get('/userevent', [UserEventController::class, 'index'])->name('userevent');
        Route::post('/userevent/create', [UserEventController::class, 'create_event'])->name('userevent.store');

        Route::get('/courespaymentpage', [UserEventController::class, 'courespaymentpage'])->name('courespaymentpage');
        Route::get('/my_event', [UserEventController::class, 'my_event'])->name('my_event');

        Route::get('/event/edit/{id}', [UserEventController::class, 'edit'])->name('event.edit');
        Route::delete('/event/delete/{id}', [UserEventController::class, 'destroy'])->name('event.delete');
        Route::delete('update/{id}', [UserEventController::class, 'update'])->name('update');


        Route::resource('PaymentHistory', PaymentHistoryController::class);
    }
);



Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'index']);
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    // Add other admin routes that require authentication
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/eventcreate', [EventController::class, 'create'])->name('admin.eventcreate');
        Route::get('/showcreateevent', [EventController::class, 'showcreateevent'])->name('admin.showcreateevent');
        Route::get('/upload_event_video', [EventController::class, 'upload_event_video'])->name('admin.upload_event_video');
        Route::post('/create_event', [EventController::class, 'create_event'])->name('create_event');
        Route::get('/pending_event', [EventController::class, 'pending_event'])->name('pending_event');
        Route::get('/allstudents', [AllStudentController::class, 'index'])->name('allstudents');
        Route::post('/uploadVideo', [EventController::class, 'uploadVideo'])->name('uploadVideo');

        Route::get('/user-events', [AdminController::class, 'usereventlist'])->name('user-events');
        Route::delete('/user-eventsdestroy/{id}', [AdminController::class, 'user_event_destroy'])->name('user-eventsdestroy');

        Route::post('/payment-history/accept/{id}', [PaymentHisController::class, 'accept'])->name('payment-history.accept');
        Route::post('/payment-history/reject/{id}', [PaymentHisController::class, 'reject'])->name('payment-history.reject');

        Route::post('/event_accept/{id}', [EventController::class, 'event_accept'])->name('event_accept.accept');
        Route::post('/event_reject/{id}', [EventController::class, 'event_reject'])->name('event_reject.reject');

        Route::resource('payment_his', PaymentHisController::class);
    });
});
