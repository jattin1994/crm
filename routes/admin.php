<?php

Route::get('/index', 'Admin\AdminController@index')->name('index');

//admin profile
Route::get('/profile', 'Admin\AdminController@profile')->name('profile');

//refernew agent by admin
Route::get('/refernewagent', 'Admin\AdminController@refernewagent')->name('refernewagent');

//sales by admin
Route::get('/sales', 'Admin\SalesController@sales')->name('sales');

//sales by notification
Route::get('/notification', 'Admin\AdminController@notification')->name('notification');

//report
Route::get('/reports', 'Admin\AdminController@reports')->name('reports');

//edit_profile
Route::get('/edit_profile', 'Admin\AdminController@edit_profile')->name('edit_profile');
Route::post('/update_profile', 'Admin\AdminController@update_profile')->name('update_profile');

//changepassword
Route::get('/change_password', 'Admin\AdminController@change_password')->name('change_password');
Route::post('/update_password', 'Admin\AdminController@update_password')->name('update_password');

//change_profile
Route::post('/change_profile', 'Admin\AdminController@change_profile')->name('change_profile');
Route::post('/remove_pic', 'Admin\AdminController@remove_pic')->name('remove_pic');

//Sales Detail
Route::get('/sales_detail/{id}', 'Admin\SalesController@sales_detail')->name('sales_detail');

//change Status
Route::post('/changestatus', 'Admin\SalesController@changestatus')->name('changestatus');

//Referal
Route::post('/submit-referral', 'Admin\ReferralController@submit_referral')->name('submit-referral');

//salesmaterials
Route::get('/salesmaterials', 'Admin\SalesMaterialsController@salesmaterials')->name('salesmaterials');

Route::get('/download/{filename}', 'Admin\SalesMaterialsController@download')->name('download');
Route::get('/download1/{filename}', 'Admin\SalesController@download1')->name('download1');

Route::post('/sale_filedelete', 'Admin\SalesController@sale_filedelete')->name('sale_filedelete');

Route::get('/notepost/{salefileid}', 'Admin\FileNoteController@notepost')->name('notepost');
Route::post('/submit_notepost', 'Admin\FileNoteController@submit_notepost')->name('submit_notepost');


Route::get('/sales_material/{saleid}', 'Admin\SalesMaterialsController@salesmaterialsform')->name('sales_material');
Route::post('/submit_salematerial', 'Admin\SalesMaterialsController@submit_salematerial')->name('submit_salematerial');

Route::get('/admin_sales_material', 'Admin\SalesMaterialsController@admin_salesmaterialsform')->name('admin_sales_material');
Route::post('/admin_submit_salematerial', 'Admin\SalesMaterialsController@admin_submit_salematerial')->name('admin_submit_salematerial');

Route::post('/delete_notification', 'Admin\AdminController@delete_notification')->name('delete_notification');
Route::post('/all_delete', 'Admin\AdminController@all_delete')->name('all_delete');

Route::get('/agent_detail/{id}', 'Admin\AdminController@agent_detail')->name('agent_detail');

Route::post('/generate_report', 'Admin\AdminController@generate_report')->name('generate_report');

Route::get('/download_report/{path}', 'Admin\AdminController@download_report')->name('download_report');

Route::post('/sales_material_delete', 'Admin\SalesMaterialsController@sales_material_delete')->name('sales_material_delete');

Route::get('/cancel', 'Admin\SalesMaterialsController@cancel')->name('cancel');

Route::get('/registermanager', 'Admin\AdminController@registermanager')->name('registermanager');
Route::post('/submit_managar', 'Admin\AdminController@submit_managar')->name('submit_managar');

Route::post('/changeagentstatus', 'Admin\AdminController@changeagentstatus')->name('changeagentstatus');


Route::get('/edit_sale/{id}', 'Admin\SalesController@edit_sale')->name('edit_sale');
Route::post('/update_sale', 'Admin\SalesController@update_sale')->name('update_sale');

Route::get('/edit_sale1/{id}', 'Admin\SalesController@edit_sale1')->name('edit_sale1');
Route::post('/update_sale1', 'Admin\SalesController@update_sale1')->name('update_sale1');

Route::get('/edit_sale2/{id}', 'Admin\SalesController@edit_sale2')->name('edit_sale2');

Route::post('/submit_sale', 'Admin\SalesController@submit_sale')->name('submit_sale');

Route::post('/sale_delete', 'Admin\SalesController@sale_delete')->name('sale_delete');

Route::get('/salenote/{businessfile_id}', 'Admin\SalesController@salenote')->name('salenote');
Route::post('/submit_salenote', 'Admin\SalesController@submit_salenote')->name('submit_salenote');


Route::get('/clients','Admin\ClientsController@clients')->name('clients');
Route::get('/client_overview/{id}','Admin\ClientsController@client_overview')->name('client_overview');
Route::get('/add_newsale/{id}','Admin\ClientsController@add_newsale')->name('add_newsale');
Route::post('/add_sale','Admin\ClientsController@add_sale')->name('add_sale');
Route::post('/add_saleamount','Admin\ClientsController@add_saleamount')->name('add_saleamount');
Route::post('/sale_notedelete','Admin\SalesController@sale_notedelete')->name('sale_notedelete');
Route::get('/salefilter/{id}','Admin\SalesController@salefilter')->name('salefilter');


Route::post('/client_filedelete','Admin\ClientsController@client_filedelete')->name('client_filedelete');
Route::post('/submit_clientfile','Admin\ClientsController@submit_clientfile')->name('submit_clientfile');
Route::get('/client_file/{id}','Admin\ClientsController@client_file')->name('client_file');

Route::get('/add_newclient/{id}','Admin\ClientsController@add_newclient')->name('add_newclient');
Route::post('/submit_client','Admin\ClientsController@submit_client')->name('submit_client');


Route::get('/add_salefolder','Admin\SalesMaterialsController@add_salefolder')->name('add_salefolder');
Route::post('/submit_folder','Admin\SalesMaterialsController@submit_folder')->name('submit_folder');
Route::post('/salefolder_delete','Admin\SalesMaterialsController@salefolder_delete')->name('salefolder_delete');

Route::get('/add_clientbanking/{id}','Admin\ClientsController@add_clientbanking')->name('add_clientbanking');
Route::post('/submit_clientbankingdetail','Admin\ClientsController@submit_clientbankingdetail')->name('submit_clientbankingdetail');
Route::post('/delete_clientbankdetail','Admin\ClientsController@delete_clientbankdetail')->name('delete_clientbankdetail');
Route::get('/editclient_account/{id}','Admin\ClientsController@editclient_account')->name('editclient_account');
Route::post('/update_clientbankingdetail','Admin\ClientsController@update_clientbankingdetail')->name('update_clientbankingdetail');
















