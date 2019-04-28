<?php

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

Route::Resource('jobpost/video','JobpostController');
Route::POST('jobpost/video/save','JobpostController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//todo
// take already entered valve anil
// open open it gives same link already entered anil
// dispaly in website
// update the site
// tell the world
// put website url to check video


// index.php
//job_template .php
// function.php
