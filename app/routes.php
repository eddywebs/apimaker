<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
});


Route::controller('debug', 'debugController'); //implicit route


Route::get('addDataset', function()
{
	$dataset= new dataset();

	$dataset->dbname='personaldb';
	$dataset->username='root';
	$dataset->password='dbpass';
	$dataset->hostname='localhost';
	$dataset->port=3306;
	$dataset->dbtype='mysql';

	$dataset->save();

	return 'done adding a dataset';
});