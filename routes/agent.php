<?php

//business Form first 
Route::get('/home', 'Agent\BusinessController@business')->name('home');
Route::post('/business', 'Agent\BusinessController@add_business')->name('business');
Route::get('/edit_business/{id}', 'Agent\BusinessController@edit_business')->name('edit_business');
Route::post('/update_business', 'Agent\BusinessController@update_business')->name('update_business');

//business Form Second for amount or type
Route::get('/business1/{id}', 'Agent\BusinessController@business1')->name('business1');
Route::post('/business1', 'Agent\BusinessController@business_detail')->name('business1');
Route::get('/edit_business1/{id}', 'Agent\BusinessController@edit_business1')->name('edit_business1');
Route::post('/update_business1', 'Agent\BusinessController@update_business1')->name('update_business1');

//business Form for upload the file
Route::get('/business2/{id}', 'Agent\BusinessController@business2')->name('business2');
Route::post('/submit_business', 'Agent\BusinessController@submit_business')->name('submit_business');

Route::get('/upload_document/{id}', 'Agent\BusinessController@upload_document')->name('upload_document');
Route::post('/delete_document', 'Agent\BusinessController@delete_document')->name('delete_document');
Route::post('/salefile', 'Agent\BusinessController@salefile')->name('salefile');


//sales detail
Route::get('/sales', 'Agent\SalesController@sales')->name('sales');
Route::get('/sales_detail/{id}', 'Agent\SalesController@sales_detail')->name('sales_detail');
Route::get('/download/{filename}', 'Agent\SalesController@download')->name('download');
Route::get('/download1/{filename}', 'Agent\SalesController@download1')->name('download1');

//referral
Route::get('/referral', 'Agent\ReferralController@referral')->name('referral');
Route::post('/submit-referral', 'Agent\ReferralController@submit_referral')->name('submit-referral');

//notification
Route::get('/notification', 'Agent\NotificationController@notification')->name('notification');

//downlines
Route::get('/downlines', 'Agent\DownlinesController@downlines')->name('downlines');
Route::get('/downline_detail/{id}', 'Agent\DownlinesController@downline_detail')->name('downline_detail');

//salesmaterials
Route::get('/salesmaterials', 'Agent\SalesMaterialsController@salesmaterials')->name('salesmaterials');

//profiledata
Route::get('/profile', 'Agent\GeneralController@profile')->name('profile');
Route::get('/add_banking', 'Agent\GeneralController@add_banking')->name('add_banking');
Route::post('/submit_bankingdetail', 'Agent\GeneralController@submit_bankingdetail')->name('submit_bankingdetail');

Route::get('/changepasswordForm/{id}', 'Agent\GeneralController@changepasswordForm')->name('changepasswordForm');
Route::post('/resetpassword', 'Agent\GeneralController@resetpassword')->name('resetpassword');
Route::post('/delete_bankdetail', 'Agent\GeneralController@delete_bankdetail')->name('delete_bankdetail');
Route::get('/edit_profile', 'Agent\GeneralController@edit_profile')->name('edit_profile');
Route::post('/update_profile', 'Agent\GeneralController@update_profile')->name('update_profile');

//change_profile
Route::post('/change_profile', 'Agent\GeneralController@change_profile')->name('change_profile');
Route::post('/remove_pic', 'Agent\GeneralController@remove_pic')->name('remove_pic');
Route::post('/delete_notification', 'Agent\NotificationController@delete_notification')->name('delete_notification');
Route::post('/all_delete', 'Agent\NotificationController@all_delete')->name('all_delete');

Route::get('/compensation/{id}', 'Agent\DownlinesController@compensation_change')->name('compensation');
Route::post('/update_compensation', 'Agent\DownlinesController@update_compensation')->name('update_compensation');

Route::post('/override', 'Agent\ReferralController@override')->name('override');

Route::get('/salefilter/{id}','Agent\SalesController@salefilter')->name('salefilter');


Route::get('/clients','Agent\ClientsController@clients')->name('clients');
Route::get('/client_overview/{id}','Agent\ClientsController@client_overview')->name('client_overview');
Route::get('/add_newsale/{id}','Agent\ClientsController@add_newsale')->name('add_newsale');
Route::get('/add_clientsale/{id}','Agent\ClientsController@add_clientsale')->name('add_clientsale');

Route::post('/add_sale','Agent\ClientsController@add_sale')->name('add_sale');


Route::post('/add_saleamount','Agent\ClientsController@add_saleamount')->name('add_saleamount');
Route::post('/client_filedelete','Agent\ClientsController@client_filedelete')->name('client_filedelete');
Route::post('/submit_clientfile','Agent\ClientsController@submit_clientfile')->name('submit_clientfile');
Route::get('/client_file/{id}','Agent\ClientsController@client_file')->name('client_file');







//