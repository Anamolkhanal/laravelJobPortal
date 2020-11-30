<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController; # don't forgot to add this
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Models\User;
use App\Notifications\notify;
// Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();
Route::get('/',[JobController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/jobs/{id}/{job}',[JobController::class,'show'])->name('jobs.show');
Route::get('/company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');

Route::get('/ss',function(){
$user=user::find(33);
User::find(33)->notify(new notify);
});
Route::get('maskAsRead',function(){
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::get('user/profile',[UserProfileController::class,'index'])->name('profile');
Route::post('profile/store',[UserProfileController::class,'store'])->name('profile.store');
Route::post('profile/coverletter',[UserProfileController::class,'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[UserProfileController::class,'resume'])->name('profile.resume');
Route::post('profile/avatar',[UserProfileController::class,'avatar'])->name('profile.avatar');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');