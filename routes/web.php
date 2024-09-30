<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\AminitiesController;
use App\Http\Controllers\Backend\PropertyTypeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//Starting Admin Routes

Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
   Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
   Route::post('/admin/profile/store',[AdminController::class,'adminProfileUpdate'])->name('admin.profile.store');
   Route::get('/admin/change/password',[AdminController::class,'adminChangePassword'])->name('admin.change.password');
   Route::post('admin/update/password',[AdminController::class,'adminUpdatePassword'])->name('admin.update.password');
});

// ProperType Routes
Route::middleware(['auth','role:admin'])->group(function(){
  Route::controller(PropertyTypeController::class)->group(function(){
     Route::get('all/type','allType')->name('all.types');
     Route::get('add/type','addType')->name('add.type');
     Route::post('store/type','storeType')->name('store.type');
     Route::get('edit/type/{id}','editType')->name('edit.type');
     Route::post('update/type/{id}','updateType')->name('update.type');
     Route::get('delete/type/{id}','deleteType')->name('delete.type');
  });
});

// Aminities Routes
Route::middleware(['auth','role:admin'])->group(function(){ 
    Route::controller(AminitiesController::class)->group(function(){
       Route::get('/all/aminities','allAminities')->name('all.aminities');
       Route::get('/add/aminities','addAminities')->name('add.aminities');
       Route::post('/store/aminities','storeAminities')->name('store.aminities');
       Route::get('edit/aminities/{id}','editAminities')->name('edit.aminities');
       Route::post('/update/aminities/{id}','updateAminities')->name('update.aminities');
       Route::get('delete/aminities/{id}','deleteAminities')->name('delete.aminities');
    });
});



Route::get('/admin/login',[AdminController::class,'adminLogin'])->name('admin.login');


//Starting Agents Routes
Route::middleware(['auth','role:agent'])->group(function (){
    Route::get('/agent/dashboard',[AgentController::class,'agentDashboard'])->name('agent.dashboard');

});




