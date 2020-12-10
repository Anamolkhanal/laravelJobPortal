<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController; # don't forgot to add this
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\notify;

Auth::routes();
Route::get('/',[JobController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/jobs/delete/{id}',[JobController::class,'delete'])->name('jobs.delete');
Route::get('/jobs/edit/{id}',[JobController::class,'edit'])->name('jobs.edit');
Route::get('/jobs/{id}/{job}',[JobController::class,'show'])->name('jobs.show');
Route::get('/jobs/create',[JobController::class,'create'])->name('jobs.create');
Route::post('/jobs/store',[JobController::class,'store'])->name('jobs.store');
Route::get('/jobs/apply',[JobController::class,'apply'])->name('jobs.apply');
Route::get('/jobs/cancel',[JobController::class,'cancel'])->name('jobs.cancel');


Route::get('/company/application',[CompanyController::class,'application'])->name('company.application');
Route::get('/company/{id}/{company}',[CompanyController::class,'index'])->name('company.index');

Route::get('maskAsRead',function(){
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');
Route::get('notificationdelete',function(){
    Auth::user()->Notifications->clear();
    return redirect()->back();
})->name('notificationdelete');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::get('profile/myapplication',[UserProfileController::class,'myapplication'])->name('myapplication');
Route::get('user/profile',[UserProfileController::class,'index'])->name('profile');
Route::post('profile/store',[UserProfileController::class,'store'])->name('profile.store');
Route::post('profile/coverletter',[UserProfileController::class,'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[UserProfileController::class,'resume'])->name('profile.resume');
Route::post('profile/avatar',[UserProfileController::class,'avatar'])->name('profile.avatar');

Route::get('company/seeker/{job_id}/{user_id}',[CompanyController::class,'seeker'])->name('company.seeker');

Route::get('company/profile',[CompanyController::class,'profile'])->name('company.profile');
Route::post('company/store',[CompanyController::class,'store'])->name('company.store');
Route::post('company/coverphoto',[CompanyController::class,'coverphoto'])->name('company.coverphoto');
Route::post('company/logo',[CompanyController::class,'logo'])->name('company.logo');


Route::get('/logout', [LoginController::class,'logout'])->name('logout'); 

Route::get('messages', [ChatsController::class, 'index'])->name('messages.chat');
Route::get('/message/{id}',[ChatsController::class, 'getMessage'])->name('message');
Route::get('message',[ChatsController::class, 'sendMessage']);
// Route::get('/home', [ChatsController::class, 'index'])->name('home');

Route::get('/sendmail/{user_id}/{job_id}/{type}',[MailController::class,'index'])->name('sendemail');
