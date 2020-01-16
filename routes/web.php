<?php

    
Route::group(['middleware' => ['LoginAuth']],function(){
    Route::get('login','AdminLoginController@index');
    Route::post('login','AdminLoginController@auth');
});


Route::group(['middleware' => ['AdminAuth']],function(){
    Route::get('/','DashboardController@index');
    
    Route::get('cashmemo','CashMemoController@index');
    Route::post('cashmemo','CashMemoController@store');

    Route::get('store','CashMemoController@store');

    Route::get('everyday','EverydayController@index');
    Route::post('everyday-search','EverydayController@everydaySearch');

    Route::get('everymonth','EveryMonthController@index');
    Route::post('everymonth-search','EveryMonthController@everyMonthSearch');

    Route::resource('production','ProductionController');
    Route::resource('extracost','ExtraCostsController');
    
    Route::get('import','ImportController@index');
    Route::post('import','ImportController@store');

    Route::get('import-type','ImportController@importType');
    Route::post('import-type','ImportController@importTypeStore');
    Route::get('import-type-edit/{id}','ImportController@importTypeEdit');
    Route::post('import-type-update','ImportController@importTypeUpdate');
    Route::get('import-type-delete/{id}','ImportController@importTypeDelete');

    Route::get('payroll','PayrollController@index');
    Route::post('payroll-search','PayrollController@search');
    Route::get('payroll-generate/{id}','PayrollController@payrollGenerate');
    Route::post('payroll-generate','PayrollController@payrollGenerator');
    Route::get('payroll-pay-view/{id}','PayrollController@payrollPayView');
    Route::post('payroll-pay','PayrollController@payrollPay');
    Route::get('payroll-view/{id}','PayrollController@payrollView');
    Route::get('payroll-report','PayrollController@payrollReport');
    //Print Invoice
    Route::get('print-invoice/{id}','CashMemoController@printInvoice');

    Route::resource('coustomer','CoustomerController');
    
    Route::get('employee','EmployeeController@index');
    Route::post('employee','EmployeeController@store');
    Route::get('employee-edit/{id}','EmployeeController@edit');
    Route::post('employee-update','EmployeeController@update');
    Route::get('employee-delete/{id}','EmployeeController@delete');

    Route::get('department','DepartmentController@index');
    Route::post('department','DepartmentController@store');
    Route::get('department-edit/{id}','DepartmentController@edit');
    Route::post('department-update','DepartmentController@update');
    Route::get('department-delete/{id}','DepartmentController@delete');
    
    Route::get('product','ProductController@index');
    Route::post('product','ProductController@store');
    Route::get('product-edit/{id}','ProductController@edit');
    Route::post('product-update','ProductController@update');
    Route::get('product-delete/{id}','ProductController@delete');

    Route::get('settings','SettingsController@index');
    Route::post('settings','SettingsController@store');
    Route::get('setting-edit/{id}','SettingsController@edit');
    Route::post('setting-update','SettingsController@update');


    Route::get('logout','AdminLoginController@logOut');
});


