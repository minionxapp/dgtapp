<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// untuk notofikasi
Route::get('/notifications/get', [App\Http\Controllers\NotificationsController::class, 'getNotificationsData'])->name('notifications.get');
// Route::get('notifications/get', 'NotificationsController@getNotificationsData')->name('notifications.get');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile')->middleware('auth');
// Route::resource('users', \App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index')->middleware(['auth', 'permission:users.index']);
Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create')->middleware(['auth', 'permission:users.create']);
Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store')->middleware(['auth', 'permission:users.create']);
Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware(['auth', 'permission:users.edit']);
Route::put('users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware(['auth', 'permission:users.edit']);
Route::delete('users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'permission:users.delete']);

// Route::resource('divisis', \App\Http\Controllers\DivisiController::class)->middleware('auth');
Route::get('/divisis', [App\Http\Controllers\DivisiController::class, 'index'])->name('divisis.index')->middleware(['auth', 'permission:divisis.index']);
Route::get('divisis/create', [App\Http\Controllers\DivisiController::class, 'create'])->name('divisis.create')->middleware(['auth', 'permission:divisis.create']);
Route::post('divisis/store', [App\Http\Controllers\DivisiController::class, 'store'])->name('divisis.store')->middleware(['auth', 'permission:divisis.create']);
Route::get('divisis/edit/{id}', [App\Http\Controllers\DivisiController::class, 'edit'])->name('divisis.edit')->middleware(['auth', 'permission:divisis.edit']);
Route::put('divisis/update/{id}', [App\Http\Controllers\DivisiController::class, 'update'])->name('divisis.update')->middleware(['auth', 'permission:divisis.edit']);
Route::delete('divisis/destroy/{id}', [App\Http\Controllers\DivisiController::class, 'destroy'])->name('divisis.destroy')->middleware(['auth', 'permission:divisis.delete']);

// Route::resource('departemens', \App\Http\Controllers\DepartemenController::class)->middleware('auth');
Route::get('/departemens', [App\Http\Controllers\DepartemenController::class, 'index'])->name('departemens.index')->middleware(['auth', 'permission:departemens.index']);
Route::get('departemens/create', [App\Http\Controllers\DepartemenController::class, 'create'])->name('departemens.create')->middleware(['auth', 'permission:departemens.create']);
Route::post('departemens/store', [App\Http\Controllers\DepartemenController::class, 'store'])->name('departemens.store')->middleware(['auth', 'permission:departemens.create']);
Route::get('departemens/edit/{id}', [App\Http\Controllers\DepartemenController::class, 'edit'])->name('departemens.edit')->middleware(['auth', 'permission:departemens.edit']);
Route::put('departemens/update/{id}', [App\Http\Controllers\DepartemenController::class, 'update'])->name('departemens.update')->middleware(['auth', 'permission:departemens.edit']);
Route::delete('departemens/destroy/{id}', [App\Http\Controllers\DepartemenController::class, 'destroy'])->name('departemens.destroy')->middleware(['auth', 'permission:departemens.delete']);

// Route::resource('tasks', \App\Http\Controllers\TaskController::class)->middleware('auth');
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index')->middleware(['auth', 'permission:tasks.index']);
Route::get('tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create')->middleware(['auth', 'permission:tasks.create']);
Route::post('tasks/store', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store')->middleware(['auth', 'permission:tasks.create']);
Route::get('tasks/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit')->middleware(['auth', 'permission:tasks.edit']);
Route::put('tasks/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update')->middleware(['auth', 'permission:tasks.edit']);
Route::delete('tasks/destroy/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy')->middleware(['auth', 'permission:tasks.delete']);

// Route::resource('params', \App\Http\Controllers\ParamController::class)->middleware('auth');
Route::get('/params', [App\Http\Controllers\ParamController::class, 'index'])->name('params.index')->middleware(['auth', 'permission:params.index']);
Route::get('params/create', [App\Http\Controllers\ParamController::class, 'create'])->name('params.create')->middleware(['auth', 'permission:params.create']);
Route::post('params/store', [App\Http\Controllers\ParamController::class, 'store'])->name('params.store')->middleware(['auth', 'permission:params.create']);
Route::get('params/edit/{id}', [App\Http\Controllers\ParamController::class, 'edit'])->name('params.edit')->middleware(['auth', 'permission:params.edit']);
Route::put('params/update/{id}', [App\Http\Controllers\ParamController::class, 'update'])->name('params.update')->middleware(['auth', 'permission:params.edit']);
Route::delete('params/destroy/{id}', [App\Http\Controllers\ParamController::class, 'destroy'])->name('params.destroy')->middleware(['auth', 'permission:params.delete']);


Route::resource('koloms', \App\Http\Controllers\KolomController::class)->middleware('auth');

// Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware('auth');
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index')->middleware(['auth', 'permission:roles.index']);
Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create')->middleware(['auth', 'permission:roles.create']);
Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store')->middleware(['auth', 'permission:roles.create']);
Route::get('roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit')->middleware(['auth', 'permission:roles.edit']);
Route::put('roles/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update')->middleware(['auth', 'permission:roles.edit']);
Route::delete('roles/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['auth', 'permission:roles.delete']);

// Route::resource('userroles', \App\Http\Controllers\UserRoleController::class)->middleware('auth');
Route::get('/userroles', [App\Http\Controllers\UserRoleController::class, 'index'])->name('userroles.index')->middleware(['auth', 'permission:userroles.index']);
Route::get('userroles/create', [App\Http\Controllers\UserRoleController::class, 'create'])->name('userroles.create')->middleware(['auth', 'permission:userroles.create']);
Route::post('userroles/store', [App\Http\Controllers\UserRoleController::class, 'store'])->name('userroles.store')->middleware(['auth', 'permission:userroles.create']);
Route::get('userroles/edit/{id}', [App\Http\Controllers\UserRoleController::class, 'edit'])->name('userroles.edit')->middleware(['auth', 'permission:userroles.edit']);
Route::put('userroles/update/{id}', [App\Http\Controllers\UserRoleController::class, 'update'])->name('userroles.update')->middleware(['auth', 'permission:userroles.edit']);
Route::delete('userroles/destroy/{id}', [App\Http\Controllers\UserRoleController::class, 'destroy'])->name('userroles.destroy')->middleware(['auth', 'permission:userroles.delete']);

// Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->middleware('auth');
Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index')->middleware(['auth', 'permission:permissions.index']);
Route::get('permissions/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create')->middleware(['auth', 'permission:permissions.create']);
Route::post('permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store')->middleware(['auth', 'permission:permissions.create']);
Route::get('permissions/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit')->middleware(['auth', 'permission:permissions.edit']);
Route::put('permissions/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update')->middleware(['auth', 'permission:permissions.edit']);
Route::delete('permissions/destroy/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware(['auth', 'permission:permissions.delete']);

// Route::resource('rolepermissions', \App\Http\Controllers\RolePermissionController::class)->middleware('auth');
Route::get('/rolepermissions', [App\Http\Controllers\RolePermissionController::class, 'index'])->name('rolepermissions.index')->middleware(['auth', 'permission:rolepermissions.index']);
Route::get('rolepermissions/create', [App\Http\Controllers\RolePermissionController::class, 'create'])->name('rolepermissions.create')->middleware(['auth', 'permission:rolepermissions.create']);
Route::post('rolepermissions/store', [App\Http\Controllers\RolePermissionController::class, 'store'])->name('rolepermissions.store')->middleware(['auth', 'permission:rolepermissions.create']);
Route::get('rolepermissions/edit/{id}', [App\Http\Controllers\RolePermissionController::class, 'edit'])->name('rolepermissions.edit')->middleware(['auth', 'permission:rolepermissions.edit']);
Route::put('rolepermissions/update/{id}', [App\Http\Controllers\RolePermissionController::class, 'update'])->name('rolepermissions.update')->middleware(['auth', 'permission:rolepermissions.edit']);
Route::delete('rolepermissions/destroy/{id}', [App\Http\Controllers\RolePermissionController::class, 'destroy'])->name('rolepermissions.destroy')->middleware(['auth', 'permission:rolepermissions.delete']);

// Route::resource('tabels', \App\Http\Controllers\TabelController::class)->middleware('auth');



Auth::routes([
  'register' => true, // Registration Routes...
  'reset' => true, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);



Route::get('/tabels', [App\Http\Controllers\TabelController::class, 'index'])->name('tabels.index')->middleware(['auth', 'permission:tabels.index']);
Route::get('tabels/create', [App\Http\Controllers\TabelController::class, 'create'])->name('tabels.create')->middleware(['auth', 'permission:tabels.create']);
Route::post('tabels/store', [App\Http\Controllers\TabelController::class, 'store'])->name('tabels.store')->middleware(['auth', 'permission:tabels.create']);
Route::get('tabels/edit/{id}', [App\Http\Controllers\TabelController::class, 'edit'])->name('tabels.edit')->middleware(['auth', 'permission:tabels.edit']);
Route::put('tabels/update/{id}', [App\Http\Controllers\TabelController::class, 'update'])->name('tabels.update')->middleware(['auth', 'permission:tabels.edit']);
Route::delete('tabels/destroy/{id}', [App\Http\Controllers\TabelController::class, 'destroy'])->name('tabels.destroy')->middleware(['auth', 'permission:tabels.delete']);


// Route::group(['middleware' => ['permission:publish articles|edit articles']], function () {
//
// });


// Route::resource('kodes', \App\Http\Controllers\KodeController::class)->middleware('auth');
// Auth::routes();
// Auth::routes();
Route::get('kolom/{id}', [App\Http\Controllers\KolomController::class, 'index'])->name('koloms.detail')->middleware('auth');
Route::get('create/{id}', [App\Http\Controllers\KolomController::class, 'create'])->name('koloms.create')->middleware('auth');
Route::get('kodescontroller/{id}', [App\Http\Controllers\KodeController::class, 'makeController'])->name('kodes.controller')->middleware('auth');
Route::get('kodesmodel/{id}', [App\Http\Controllers\KodeController::class, 'makeModel'])->name('kodes.model')->middleware('auth');
Route::get('kodesvindex/{id}', [App\Http\Controllers\KodeController::class, 'makeVIndex'])->name('kodes.model')->middleware('auth');
Route::get('kodesvcreate/{id}', [App\Http\Controllers\KodeController::class, 'makeVCreate'])->name('kodes.create')->middleware('auth');
Route::get('kodesvedit/{id}', [App\Http\Controllers\KodeController::class, 'makeVEdit'])->name('kodes.edit')->middleware('auth');
Route::get('kodesmigrate/{id}', [App\Http\Controllers\KodeController::class, 'makeMigrate'])->name('kodes.migrate')->middleware('auth');
Route::get('kodesroute/{id}', [App\Http\Controllers\KodeController::class, 'makeRoute'])->name('kodes.route')->middleware('auth');
Route::get('kodesfile/{id}/{string}', [App\Http\Controllers\KodeController::class, 'makeFile'])->name('kodes.file')->middleware('auth');



// unutk util
Route::get('/departemens_divisi/{id}', [App\Http\Controllers\UtilController::class, 'departemenByDivisi'])->name('departemens_divisi');
Route::get('/param_nama/{id}', [App\Http\Controllers\UtilController::class, 'paramByNama'])->name('paramByNama');

// test make script
Route::resource('kendaraans', \App\Http\Controllers\KendaraanController::class)->middleware('auth');



Route::get('/cobas', [App\Http\Controllers\CobaController::class, 'index'])->name('cobas.index')->middleware(['auth', 'permission:cobas.index']);
Route::get('cobas/create', [App\Http\Controllers\CobaController::class, 'create'])->name('cobas.create')->middleware(['auth', 'permission:cobas.create']);
Route::post('cobas/store', [App\Http\Controllers\CobaController::class, 'store'])->name('cobas.store')->middleware(['auth', 'permission:cobas.create']);
Route::get('cobas/edit/{id}', [App\Http\Controllers\CobaController::class, 'edit'])->name('cobas.edit')->middleware(['auth', 'permission:cobas.edit']);
Route::put('cobas/update/{id}', [App\Http\Controllers\CobaController::class, 'update'])->name('cobas.update')->middleware(['auth', 'permission:cobas.edit']);
Route::delete('cobas/destroy/{id}', [App\Http\Controllers\CobaController::class, 'destroy'])->name('cobas.destroy')->middleware(['auth', 'permission:cobas.delete']);
Route::get('cobas/hapusfile/{id}', [App\Http\Controllers\CobaController::class, 'hapusfile'])->name('cobas.hapusfile')->middleware(['auth', 'permission:cobas.edit']);


Route::get('/seqs', [App\Http\Controllers\SeqController::class, 'index'])->name('seqs.index')->middleware(['auth','permission:seqs.index']);
Route::get('seqs/create', [App\Http\Controllers\SeqController::class, 'create'])->name('seqs.create')->middleware(['auth','permission:seqs.create']);
Route::post('seqs/store', [App\Http\Controllers\SeqController::class, 'store'])->name('seqs.store')->middleware(['auth','permission:seqs.create']);
Route::get('seqs/edit/{id}', [App\Http\Controllers\SeqController::class, 'edit'])->name('seqs.edit')->middleware(['auth','permission:seqs.edit']);
Route::put('seqs/update/{id}', [App\Http\Controllers\SeqController::class, 'update'])->name('seqs.update')->middleware(['auth','permission:seqs.edit']);
Route::delete('seqs/destroy/{id}', [App\Http\Controllers\SeqController::class, 'destroy'])->name('seqs.destroy')->middleware(['auth','permission:seqs.delete']);

Route::get('/files', [App\Http\Controllers\FileController::class, 'index'])->name('files.index')->middleware(['auth','permission:files.index']);
Route::get('files/create', [App\Http\Controllers\FileController::class, 'create'])->name('files.create')->middleware(['auth','permission:files.create']);
Route::post('files/store', [App\Http\Controllers\FileController::class, 'store'])->name('files.store')->middleware(['auth','permission:files.create']);
Route::get('files/edit/{id}', [App\Http\Controllers\FileController::class, 'edit'])->name('files.edit')->middleware(['auth','permission:files.edit']);
Route::put('files/update/{id}', [App\Http\Controllers\FileController::class, 'update'])->name('files.update')->middleware(['auth','permission:files.edit']);
Route::delete('files/destroy/{id}', [App\Http\Controllers\FileController::class, 'destroy'])->name('files.destroy')->middleware(['auth','permission:files.delete']);

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index')->middleware(['auth','permission:projects.index']);
Route::get('projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create')->middleware(['auth','permission:projects.create']);
Route::post('projects/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store')->middleware(['auth','permission:projects.create']);
Route::get('projects/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit')->middleware(['auth','permission:projects.edit']);
Route::put('projects/update/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update')->middleware(['auth','permission:projects.edit']);
Route::delete('projects/destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy')->middleware(['auth','permission:projects.delete']);


// test coding
Route::get('/jajals', [App\Http\Controllers\JajalController::class, 'index'])->name('jajals.index')->middleware(['auth','permission:jajals.index']);
Route::get('jajals/create', [App\Http\Controllers\JajalController::class, 'create'])->name('jajals.create')->middleware(['auth','permission:jajals.create']);
Route::post('jajals/store', [App\Http\Controllers\JajalController::class, 'store'])->name('jajals.store')->middleware(['auth','permission:jajals.create']);
Route::get('jajals/edit/{id}', [App\Http\Controllers\JajalController::class, 'edit'])->name('jajals.edit')->middleware(['auth','permission:jajals.edit']);
Route::put('jajals/update/{id}', [App\Http\Controllers\JajalController::class, 'update'])->name('jajals.update')->middleware(['auth','permission:jajals.edit']);
Route::delete('jajals/destroy/{id}', [App\Http\Controllers\JajalController::class, 'destroy'])->name('jajals.destroy')->middleware(['auth','permission:jajals.delete']);


Route::post('/simpanfile', [App\Http\Controllers\TaskController::class, 'simpanFile'])->name('simpanfile')->middleware(['auth']);


Route::get('/enkripsi',  [App\Http\Controllers\EndecController::class, 'enkripsi']);