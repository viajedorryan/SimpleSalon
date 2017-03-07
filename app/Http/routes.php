<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'EmployeeController@home');
    

Route::get('/add/service', function () {
    return view('dashboard.service');
});
//////////EMPLOYEE ROUTES
Route::get('/view/employee', 'EmployeeController@employee');
Route::get('/employee/unavail/{id}', 'EmployeeController@unavail');
Route::get('/employee/avail/{id}', 'EmployeeController@avail');

//////////AVAILEDSERVICES ROUTES
Route::get('/view/service', 'AvailedserviceController@view');
Route::resource('/add/services', 'AvailedserviceController@add');






Route::get('/view/employeee', function () {
    $emps =  App\Employee::all();
    return view('dashboard.employee')->with('emps', $emps);
});

Route::get('/pos', function () {
    $emps =  App\Employee::find(1)->get();
    echo $emps->pos;
});