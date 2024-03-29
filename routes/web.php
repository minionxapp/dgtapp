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
Route::get('hapusfile/{id}', [App\Http\Controllers\FileController::class, 'hapusfile'])->name('file.hapusfile')->middleware(['auth', 'permission:files.edit']);

Route::get('/filesindex/{id}', [App\Http\Controllers\FileController::class, 'indexfile'])->name('files.indexfile')->middleware(['auth','permission:files.index']);
Route::get('files/createfile/{id}', [App\Http\Controllers\FileController::class, 'createfile'])->name('files.createfile')->middleware(['auth','permission:files.create']);




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

// LSP
Route::get('/lsp_skemas', [App\Http\Controllers\Lsp_skemaController::class, 'index'])->name('lsp_skemas.index')->middleware(['auth','permission:lsp_skemas.index']);
Route::get('lsp_skemas/create', [App\Http\Controllers\Lsp_skemaController::class, 'create'])->name('lsp_skemas.create')->middleware(['auth','permission:lsp_skemas.create']);
Route::post('lsp_skemas/store', [App\Http\Controllers\Lsp_skemaController::class, 'store'])->name('lsp_skemas.store')->middleware(['auth','permission:lsp_skemas.create']);
Route::get('lsp_skemas/edit/{id}', [App\Http\Controllers\Lsp_skemaController::class, 'edit'])->name('lsp_skemas.edit')->middleware(['auth','permission:lsp_skemas.edit']);
Route::put('lsp_skemas/update/{id}', [App\Http\Controllers\Lsp_skemaController::class, 'update'])->name('lsp_skemas.update')->middleware(['auth','permission:lsp_skemas.edit']);
Route::delete('lsp_skemas/destroy/{id}', [App\Http\Controllers\Lsp_skemaController::class, 'destroy'])->name('lsp_skemas.destroy')->middleware(['auth','permission:lsp_skemas.delete']);

Route::get('/lsp_sertifikats', [App\Http\Controllers\Lsp_sertifikatController::class, 'index'])->name('lsp_sertifikats.index')->middleware(['auth','permission:lsp_sertifikats.index']);
Route::get('lsp_sertifikats/create', [App\Http\Controllers\Lsp_sertifikatController::class, 'create'])->name('lsp_sertifikats.create')->middleware(['auth','permission:lsp_sertifikats.create']);
Route::post('lsp_sertifikats/store', [App\Http\Controllers\Lsp_sertifikatController::class, 'store'])->name('lsp_sertifikats.store')->middleware(['auth','permission:lsp_sertifikats.create']);
Route::get('lsp_sertifikats/edit/{id}', [App\Http\Controllers\Lsp_sertifikatController::class, 'edit'])->name('lsp_sertifikats.edit')->middleware(['auth','permission:lsp_sertifikats.edit']);
Route::put('lsp_sertifikats/update/{id}', [App\Http\Controllers\Lsp_sertifikatController::class, 'update'])->name('lsp_sertifikats.update')->middleware(['auth','permission:lsp_sertifikats.edit']);
Route::delete('lsp_sertifikats/destroy/{id}', [App\Http\Controllers\Lsp_sertifikatController::class, 'destroy'])->name('lsp_sertifikats.destroy')->middleware(['auth','permission:lsp_sertifikats.delete']);

Route::get('/sertifikats/{nama}', [App\Http\Controllers\Lsp_sertifikatController::class, 'sertifikat'])->name('lsp_sertifikats.sertifikats')->middleware(['auth','permission:lsp_sertifikats.index']);

Route::get('lsp_sertifikats/updatenik/{ids}/{nik}', [App\Http\Controllers\Lsp_sertifikatController::class, 'updatenik'])->name('lsp_sertifikats.updatenik')->middleware(['auth','permission:lsp_sertifikats.index']);
Route::get('lsp_sertifikats/kirimSertifikat', [App\Http\Controllers\Lsp_sertifikatController::class, 'KirimSertifikat'])->name('lsp_sertifikats.kirimSertifikat')->middleware(['auth','permission:lsp_sertifikats.index']);

Route::get('/lsp_dashboard', [App\Http\Controllers\Lsp_dasboardController::class, 'index'])->name('lsp_dashboard')->middleware('auth');


//make route

Route::get('/pegawais', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawais.index')->middleware(['auth','permission:pegawais.index']);
Route::get('pegawais/create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawais.create')->middleware(['auth','permission:pegawais.create']);
Route::post('pegawais/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawais.store')->middleware(['auth','permission:pegawais.create']);
Route::get('pegawais/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawais.edit')->middleware(['auth','permission:pegawais.edit']);
Route::put('pegawais/update/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawais.update')->middleware(['auth','permission:pegawais.edit']);
Route::delete('pegawais/destroy/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('pegawais.destroy')->middleware(['auth','permission:pegawais.delete']);
Route::get('/pegawai/{nama}', [App\Http\Controllers\PegawaiController::class, 'pegawai'])->name('pegawais.cari')->middleware(['auth','permission:pegawais.index']);
Route::get('/pegawai/pegawainik/{nik}', [App\Http\Controllers\PegawaiController::class, 'pegawainik'])->name('pegawais.pegawainik')->middleware(['auth','permission:pegawais.index']);


//make route training_notes
Route::get('/training_notes', [App\Http\Controllers\Training_noteController::class, 'index'])->name('training_notes.index')->middleware(['auth','permission:training_notes.index']);
Route::get('training_notes/create', [App\Http\Controllers\Training_noteController::class, 'create'])->name('training_notes.create')->middleware(['auth','permission:training_notes.create']);
Route::post('training_notes/store', [App\Http\Controllers\Training_noteController::class, 'store'])->name('training_notes.store')->middleware(['auth','permission:training_notes.create']);
Route::get('training_notes/edit/{id}', [App\Http\Controllers\Training_noteController::class, 'edit'])->name('training_notes.edit')->middleware(['auth','permission:training_notes.edit']);
Route::put('training_notes/update/{id}', [App\Http\Controllers\Training_noteController::class, 'update'])->name('training_notes.update')->middleware(['auth','permission:training_notes.edit']);
Route::delete('training_notes/destroy/{id}', [App\Http\Controllers\Training_noteController::class, 'destroy'])->name('training_notes.destroy')->middleware(['auth','permission:training_notes.delete']);


//make route training_plans

Route::get('/training_plans', [App\Http\Controllers\Training_planController::class, 'index'])->name('training_plans.index')->middleware(['auth','permission:training_plans.index']);
Route::get('training_plans/create', [App\Http\Controllers\Training_planController::class, 'create'])->name('training_plans.create')->middleware(['auth','permission:training_plans.create']);
Route::post('training_plans/store', [App\Http\Controllers\Training_planController::class, 'store'])->name('training_plans.store')->middleware(['auth','permission:training_plans.create']);
Route::get('training_plans/edit/{id}', [App\Http\Controllers\Training_planController::class, 'edit'])->name('training_plans.edit')->middleware(['auth','permission:training_plans.edit']);
Route::put('training_plans/update/{id}', [App\Http\Controllers\Training_planController::class, 'update'])->name('training_plans.update')->middleware(['auth','permission:training_plans.edit']);
Route::delete('training_plans/destroy/{id}', [App\Http\Controllers\Training_planController::class, 'destroy'])->name('training_plans.destroy')->middleware(['auth','permission:training_plans.delete']);



//make route vm_perusahaans

Route::get('/vm_perusahaans', [App\Http\Controllers\Vm_perusahaanController::class, 'index'])->name('vm_perusahaans.index')->middleware(['auth','permission:vm_perusahaans.index']);
Route::get('vm_perusahaans/create', [App\Http\Controllers\Vm_perusahaanController::class, 'create'])->name('vm_perusahaans.create')->middleware(['auth','permission:vm_perusahaans.create']);
Route::post('vm_perusahaans/store', [App\Http\Controllers\Vm_perusahaanController::class, 'store'])->name('vm_perusahaans.store')->middleware(['auth','permission:vm_perusahaans.create']);
Route::get('vm_perusahaans/edit/{id}', [App\Http\Controllers\Vm_perusahaanController::class, 'edit'])->name('vm_perusahaans.edit')->middleware(['auth','permission:vm_perusahaans.edit']);
Route::put('vm_perusahaans/update/{id}', [App\Http\Controllers\Vm_perusahaanController::class, 'update'])->name('vm_perusahaans.update')->middleware(['auth','permission:vm_perusahaans.edit']);
Route::delete('vm_perusahaans/destroy/{id}', [App\Http\Controllers\Vm_perusahaanController::class, 'destroy'])->name('vm_perusahaans.destroy')->middleware(['auth','permission:vm_perusahaans.delete']);

//make route training_licenses

Route::get('/training_licenses', [App\Http\Controllers\Training_licenseController::class, 'index'])->name('training_licenses.index')->middleware(['auth','permission:training_licenses.index']);
Route::get('training_licenses/create', [App\Http\Controllers\Training_licenseController::class, 'create'])->name('training_licenses.create')->middleware(['auth','permission:training_licenses.create']);
Route::post('training_licenses/store', [App\Http\Controllers\Training_licenseController::class, 'store'])->name('training_licenses.store')->middleware(['auth','permission:training_licenses.create']);
Route::get('training_licenses/edit/{id}', [App\Http\Controllers\Training_licenseController::class, 'edit'])->name('training_licenses.edit')->middleware(['auth','permission:training_licenses.edit']);
Route::put('training_licenses/update/{id}', [App\Http\Controllers\Training_licenseController::class, 'update'])->name('training_licenses.update')->middleware(['auth','permission:training_licenses.edit']);
Route::delete('training_licenses/destroy/{id}', [App\Http\Controllers\Training_licenseController::class, 'destroy'])->name('training_licenses.destroy')->middleware(['auth','permission:training_licenses.delete']);


Route::get('/noseq', [App\Http\Controllers\SeqController::class, 'noseq'])->name('seq.noseq')->middleware(['auth']);


Route::get('training_plan_pesertas_detail/{id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'index'])->name('training_plan_pesertas.index')->middleware(['auth','permission:training_plan_pesertas.index']);
Route::get('training_plan_pesertas/create/{id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'create'])->name('training_plan_pesertas.create')->middleware(['auth','permission:training_plan_pesertas.create']);
Route::post('training_plan_pesertas/store', [App\Http\Controllers\Training_plan_pesertaController::class, 'store'])->name('training_plan_pesertas.store')->middleware(['auth','permission:training_plan_pesertas.create']);
Route::get('training_plan_pesertas/edit/{id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'edit'])->name('training_plan_pesertas.edit')->middleware(['auth','permission:training_plan_pesertas.edit']);
Route::put('training_plan_pesertas/update/{id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'update'])->name('training_plan_pesertas.update')->middleware(['auth','permission:training_plan_pesertas.edit']);
Route::delete('training_plan_pesertas/destroy/{id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'destroy'])->name('training_plan_pesertas.destroy')->middleware(['auth','permission:training_plan_pesertas.delete']);
Route::get('training_plan_pesertas_cek/{id}/{training_id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'CekPeserta'])->name('training_plan_pesertas.cekpeserta')->middleware(['auth','permission:training_plan_pesertas.index']);
Route::get('training_plan_pesertas_export/{training_id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'ExportPeserta'])->name('training_plan_pesertas.export')->middleware(['auth','permission:training_plan_pesertas.create']);
Route::post('training_plan_pesertas_import/{training_id}', [App\Http\Controllers\Training_plan_pesertaController::class, 'ImportPeserta'])->name('training_plan_pesertas.import')->middleware(['auth','permission:training_plan_pesertas.create']);



//make route  mentor_surtugs

Route::get('/mentor_surtugs', [App\Http\Controllers\Mentor_surtugController::class, 'index'])->name('mentor_surtugs.index')->middleware(['auth','permission:mentor_surtugs.index']);
Route::get('mentor_surtugs/create', [App\Http\Controllers\Mentor_surtugController::class, 'create'])->name('mentor_surtugs.create')->middleware(['auth','permission:mentor_surtugs.create']);
Route::post('mentor_surtugs/store', [App\Http\Controllers\Mentor_surtugController::class, 'store'])->name('mentor_surtugs.store')->middleware(['auth','permission:mentor_surtugs.create']);
Route::get('mentor_surtugs/edit/{id}', [App\Http\Controllers\Mentor_surtugController::class, 'edit'])->name('mentor_surtugs.edit')->middleware(['auth','permission:mentor_surtugs.edit']);
Route::put('mentor_surtugs/update/{id}', [App\Http\Controllers\Mentor_surtugController::class, 'update'])->name('mentor_surtugs.update')->middleware(['auth','permission:mentor_surtugs.edit']);
Route::delete('mentor_surtugs/destroy/{id}', [App\Http\Controllers\Mentor_surtugController::class, 'destroy'])->name('mentor_surtugs.destroy')->middleware(['auth','permission:mentor_surtugs.delete']);


//make route mentor_mentors
Route::get('/mentor_mentors', [App\Http\Controllers\Mentor_mentorController::class, 'index'])->name('mentor_mentors.index')->middleware(['auth','permission:mentor_mentors.index']);
Route::get('mentor_mentors/create/{id}', [App\Http\Controllers\Mentor_mentorController::class, 'create'])->name('mentor_mentors.create')->middleware(['auth','permission:mentor_mentors.create']);
Route::post('mentor_mentors/store', [App\Http\Controllers\Mentor_mentorController::class, 'store'])->name('mentor_mentors.store')->middleware(['auth','permission:mentor_mentors.create']);
Route::get('mentor_mentors/edit/{id}', [App\Http\Controllers\Mentor_mentorController::class, 'edit'])->name('mentor_mentors.edit')->middleware(['auth','permission:mentor_mentors.edit']);
Route::put('mentor_mentors/update/{id}', [App\Http\Controllers\Mentor_mentorController::class, 'update'])->name('mentor_mentors.update')->middleware(['auth','permission:mentor_mentors.edit']);
Route::delete('mentor_mentors/destroy/{id}', [App\Http\Controllers\Mentor_mentorController::class, 'destroy'])->name('mentor_mentors.destroy')->middleware(['auth','permission:mentor_mentors.delete']);
Route::get('/mentor_mentors_surtug/{id}', [App\Http\Controllers\Mentor_mentorController::class, 'mentorIndex'])->name('mentor_mentors_surtug.index')->middleware(['auth','permission:mentor_mentors.index']);


//make route mentor_mentes

Route::get('/mentor_mentes', [App\Http\Controllers\Mentor_menteController::class, 'index'])->name('mentor_mentes.index')->middleware(['auth','permission:mentor_mentes.index']);
Route::get('mentor_mentes/create/{id}', [App\Http\Controllers\Mentor_menteController::class, 'create'])->name('mentor_mentes.create')->middleware(['auth','permission:mentor_mentes.create']);
Route::post('mentor_mentes/store', [App\Http\Controllers\Mentor_menteController::class, 'store'])->name('mentor_mentes.store')->middleware(['auth','permission:mentor_mentes.create']);
Route::get('mentor_mentes/edit/{id}', [App\Http\Controllers\Mentor_menteController::class, 'edit'])->name('mentor_mentes.edit')->middleware(['auth','permission:mentor_mentes.edit']);
Route::put('mentor_mentes/update/{id}', [App\Http\Controllers\Mentor_menteController::class, 'update'])->name('mentor_mentes.update')->middleware(['auth','permission:mentor_mentes.edit']);
Route::delete('mentor_mentes/destroy/{id}', [App\Http\Controllers\Mentor_menteController::class, 'destroy'])->name('mentor_mentes.destroy')->middleware(['auth','permission:mentor_mentes.delete']);
Route::get('/mentor_mentes_surtug/{id}', [App\Http\Controllers\Mentor_menteController::class, 'menteIndex'])->name('mentor_mentes_surtug.index')->middleware(['auth','permission:mentor_mentes.index']);

//make route mentor_events

Route::get('/mentor_events', [App\Http\Controllers\Mentor_eventController::class, 'index'])->name('mentor_events.index')->middleware(['auth','permission:mentor_events.index']);
Route::get('mentor_events/create', [App\Http\Controllers\Mentor_eventController::class, 'create'])->name('mentor_events.create')->middleware(['auth','permission:mentor_events.create']);
Route::post('mentor_events/store', [App\Http\Controllers\Mentor_eventController::class, 'store'])->name('mentor_events.store')->middleware(['auth','permission:mentor_events.create']);
Route::get('mentor_events/edit/{id}', [App\Http\Controllers\Mentor_eventController::class, 'edit'])->name('mentor_events.edit')->middleware(['auth','permission:mentor_events.edit']);
Route::put('mentor_events/update/{id}', [App\Http\Controllers\Mentor_eventController::class, 'update'])->name('mentor_events.update')->middleware(['auth','permission:mentor_events.edit']);
Route::delete('mentor_events/destroy/{id}', [App\Http\Controllers\Mentor_eventController::class, 'destroy'])->name('mentor_events.destroy')->middleware(['auth','permission:mentor_events.delete']);

//make route mentor_event_members
Route::get('/mentor_event_members', [App\Http\Controllers\Mentor_event_memberController::class, 'index'])->name('mentor_event_members.index')->middleware(['auth','permission:mentor_event_members.index']);
Route::get('mentor_event_members/create/{surtug}', [App\Http\Controllers\Mentor_event_memberController::class, 'create'])->name('mentor_event_members.create')->middleware(['auth','permission:mentor_event_members.create']);
Route::post('mentor_event_members/store', [App\Http\Controllers\Mentor_event_memberController::class, 'store'])->name('mentor_event_members.store')->middleware(['auth','permission:mentor_event_members.create']);
Route::get('mentor_event_members/edit/{id}', [App\Http\Controllers\Mentor_event_memberController::class, 'edit'])->name('mentor_event_members.edit')->middleware(['auth','permission:mentor_event_members.edit']);
Route::put('mentor_event_members/update/{id}', [App\Http\Controllers\Mentor_event_memberController::class, 'update'])->name('mentor_event_members.update')->middleware(['auth','permission:mentor_event_members.edit']);
Route::delete('mentor_event_members/destroy/{id}', [App\Http\Controllers\Mentor_event_memberController::class, 'destroy'])->name('mentor_event_members.destroy')->middleware(['auth','permission:mentor_event_members.delete']);
Route::get('/mentor_event_members_index/{surtug}', [App\Http\Controllers\Mentor_event_memberController::class, 'indexevent'])->name('mentor_event_members_index.index')->middleware(['auth','permission:mentor_event_members.index']);

//make route biaya training /Training_cost

Route::get('/training_costs', [App\Http\Controllers\Training_costController::class, 'index'])->name('training_costs.index')->middleware(['auth','permission:training_costs.index']);
Route::get('training_costs/create/{training_id}', [App\Http\Controllers\Training_costController::class, 'create'])->name('training_costs.create')->middleware(['auth','permission:training_costs.create']);
Route::post('training_costs/store', [App\Http\Controllers\Training_costController::class, 'store'])->name('training_costs.store')->middleware(['auth','permission:training_costs.create']);
Route::get('training_costs/edit/{id}', [App\Http\Controllers\Training_costController::class, 'edit'])->name('training_costs.edit')->middleware(['auth','permission:training_costs.edit']);
Route::put('training_costs/update/{id}', [App\Http\Controllers\Training_costController::class, 'update'])->name('training_costs.update')->middleware(['auth','permission:training_costs.edit']);
Route::delete('training_costs/destroy/{id}', [App\Http\Controllers\Training_costController::class, 'destroy'])->name('training_costs.destroy')->middleware(['auth','permission:training_costs.delete']);
Route::get('/training_costs_index/{training_id}', [App\Http\Controllers\Training_costController::class, 'index_trainingid'])->name('training_costs_index.index')->middleware(['auth','permission:training_costs.index']);


//make route training_intrainers

Route::get('/training_intrainers', [App\Http\Controllers\Training_intrainerController::class, 'index'])->name('training_intrainers.index')->middleware(['auth','permission:training_intrainers.index']);
Route::get('training_intrainers/create/{training_id}', [App\Http\Controllers\Training_intrainerController::class, 'create'])->name('training_intrainers.create')->middleware(['auth','permission:training_intrainers.create']);
Route::post('training_intrainers/store', [App\Http\Controllers\Training_intrainerController::class, 'store'])->name('training_intrainers.store')->middleware(['auth','permission:training_intrainers.create']);
Route::get('training_intrainers/edit/{id}', [App\Http\Controllers\Training_intrainerController::class, 'edit'])->name('training_intrainers.edit')->middleware(['auth','permission:training_intrainers.edit']);
Route::put('training_intrainers/update/{id}', [App\Http\Controllers\Training_intrainerController::class, 'update'])->name('training_intrainers.update')->middleware(['auth','permission:training_intrainers.edit']);
Route::delete('training_intrainers/destroy/{id}', [App\Http\Controllers\Training_intrainerController::class, 'destroy'])->name('training_intrainers.destroy')->middleware(['auth','permission:training_intrainers.delete']);
Route::get('/training_intrainers_index/{training_id}', [App\Http\Controllers\Training_intrainerController::class, 'index_trainingid'])->name('training_intrainers_index.index')->middleware(['auth','permission:training_intrainers.index']);
