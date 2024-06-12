<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PermissionController;
use App\Models\Attendance;
use App\Models\Permission;
use App\Models\User;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        $userCount = User::count();
        $attendanceCount = Attendance::count();
        $permissionCount = Permission::count();
        
        return view('pages.dashboard', [
            'type_menu' => 'home',
            'userCount' => $userCount,
            'attendanceCount' => $attendanceCount,
            'permissionCount' => $permissionCount
        ]);
    })->name('home');
    
    // Route::get('home', function () {
    //     return view('pages.dashboard', ['type_menu' => 'home']);
    // })->name('home');

    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('attendances/export', [AttendanceController::class, 'export'])->name('export');
});
