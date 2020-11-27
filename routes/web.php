<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 
//use App\Http\Controllers\HomeController; # don't forgot to add this
use App\Http\Controllers\JobController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/',[JobController::class, 'index']);
//Route::get('/home', [HomeController::class, 'index']);

Route::get('/jobs/{id}/{job}','App\Http\Controllers\JobController@show')->name('jobs.show');
Route::get('/company/{id}/{company}','App\Http\Controllers\CompanyController@index')->name('company.index');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::get('user/profile','App\Http\Controllers\USerProfileController@index');
Route::post('profile/store','App\Http\Controllers\USerProfileController@store')->name('profile.store');

