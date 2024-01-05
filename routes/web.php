<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/resume', 'ResumeController@index')->name('resume');

Route::resource('user-detail', 'UserDetailController');
Route::resource('education', 'EducationController');
Route::resource('experience', 'ExperienceController');
Route::resource('skill', 'SkillController');
Route::resource('certificate', 'CertificateController');
