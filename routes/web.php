<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\AdminDeliveryController;
use App\Http\Controllers\ChefOrderController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MenuuController;
use App\Http\Controllers\OrderrController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:chef'])->prefix('chef')->name('chef.')->group(function () {
    Route::get('/dashboard', function () {
        return view('chef.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        $menus = \App\Models\Menu::all();
        return view('customer.dashboard', compact('menus'));
    })->name('dashboard');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.orders.index');
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments');
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/deliveries', [AdminDeliveryController::class, 'index'])->name('admin.deliveries');
    Route::get('/deliveries', [AdminDeliveryController::class, 'index'])->name('admin.deliveries.index');
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('admin.feedback.index');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/menus/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
    Route::put('/menus/{id}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('/menus/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');
    Route::get('/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');
});



Route::middleware(['auth', 'role:chef'])->prefix('chef')->group(function () {
    Route::get('/orders', [ChefOrderController::class, 'index'])->name('chef.orders.index');
    Route::put('/orders/{id}', [OrderrController::class, 'update'])->name('chef.orders.update');
});


Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/menus', [MenuuController::class, 'index'])->name('customer.menus.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('customer.orders.store');

    Route::resource('payments', PaymentController::class)->only(['index', 'create', 'store']);
    Route::get('/payments', [PaymentController::class, 'index'])->name('customer.payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('customer.payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('customer.payments.store');
    
});
Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
    Route::resource('deliveries', DeliveryController::class)->only(['index', 'show']);
});
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create/{order_id}', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/customer/feedback/create/{order_id}', [FeedbackController::class, 'create'])->name('customer.feedback.create');
});

// Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
//     Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
//     Route::get('/feedback/create/{order_id}', [FeedbackController::class, 'create'])->name('feedback.create');
//     Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
//     Route::resource('feedback', FeedbackController::class)->only(['create', 'store', 'index']);
//     
//     Route::get('feedback', [FeedbackController::class, 'index'])->name('customer.feedback.index');
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
