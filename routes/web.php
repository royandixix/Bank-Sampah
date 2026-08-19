<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,DashboardController,WasteCategoryController,WasteController,DepositController,WithdrawalController,ComplaintController,ReportController,UserController};

Route::get('/', fn()=>redirect()->route('dashboard'));
Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,'showLogin'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login.submit');
});
Route::middleware('auth')->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/deposits',[DepositController::class,'index'])->name('deposits.index');
    Route::get('/deposits/{deposit}',[DepositController::class,'show'])->name('deposits.show');
    Route::get('/withdrawals',[WithdrawalController::class,'index'])->name('withdrawals.index');
    Route::get('/withdrawals/{withdrawal}',[WithdrawalController::class,'show'])->name('withdrawals.show');
    Route::get('/complaints',[ComplaintController::class,'index'])->name('complaints.index');

    Route::middleware('role:admin,petugas')->group(function(){
        Route::resource('wastes',WasteController::class)->except('show');
        Route::get('/deposits-create',[DepositController::class,'create'])->name('deposits.create');
        Route::post('/deposits',[DepositController::class,'store'])->name('deposits.store');
        Route::patch('/deposits/{deposit}/status',[DepositController::class,'updateStatus'])->name('deposits.status');
        Route::patch('/withdrawals/{withdrawal}/status',[WithdrawalController::class,'updateStatus'])->name('withdrawals.status');
        Route::patch('/complaints/{complaint}',[ComplaintController::class,'update'])->name('complaints.update');
        Route::get('/reports',[ReportController::class,'index'])->name('reports.index');
    });

    Route::middleware('role:admin')->group(function(){
        Route::resource('categories',WasteCategoryController::class)->except('show');
        Route::resource('users',UserController::class)->except('show');
    });

    Route::middleware('role:nasabah')->group(function(){
        Route::get('/withdrawals-create',[WithdrawalController::class,'create'])->name('withdrawals.create');
        Route::post('/withdrawals',[WithdrawalController::class,'store'])->name('withdrawals.store');
        Route::get('/complaints-create',[ComplaintController::class,'create'])->name('complaints.create');
        Route::post('/complaints',[ComplaintController::class,'store'])->name('complaints.store');
    });
});
