<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// User Login

Route::group([

    'prefix' => 'api'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user-profile', 'AuthController@me');


});

$router->get('/user', 'UserController@index');
$router->get('/user/{id}', 'UserController@getID');
$router->post('/user', 'UserController@add');
$router->put('/user/{id}', 'UserController@update');
$router->delete('/user/{userID}', 'UserController@delete');

// Features of user microservice

$router->get('/name/search', 'UserController@searchName'); // FIXED


// Transaction System 

    // Transaction routes
$router->get('/transactions', 'TransactionController@index');
$router->get('/transaction/{id}', 'TransactionController@TransactionWithID');
$router->post('/transactions', 'TransactionController@AddTransaction');
$router->put('/transactions/{id}', 'TransactionController@UpdateTransaction');
$router->delete('/transactions/{id}', 'TransactionController@DeleteTransaction');

    // Transaction Features
    $router->get('/t/claim/{ItemID}', 'TransactionController@Claim');
    $router->get('/buyer/{SellerID}', 'TransactionController@ShowBuyerDetails');


// Transaction Invoices routes

$router->get('t/invoices','TransactionController@Invoices');
$router->get('t/invoices/{id}','TransactionController@InvoicesID');
$router->post('t/invoices','TransactionController@AddInvoice');
$router->delete('t/invoices/{id}','TransactionController@DeleteInvoice');


// Inventory System 

    // Items routes

$router->get('items','InventoryController@index');
$router->get('items/{ItemID}','InventoryController@ItemID');
$router->post('items','InventoryController@AddItem');
$router->delete('items/{ItemID}','InventoryController@DeleteItem');

    //Bids Routes

$router->get('bids','InventoryController@Bids');
$router->get('bids/{BidID}','InventoryController@BidsID');
$router->delete('bids/{BidID}','InventoryController@DeleteBids');

    // Item Features

    $router->get('filter','InventoryController@Filter'); 
    $router->get('highbids','InventoryController@HigherBid');

    // Bids Features

    $router->put('updatebid/{id}','InventoryController@UpdateBidAmount');
    $router->post('add/bidamount','InventoryController@addBidAmount');
    $router->get('bid/info/{BidID}','InventoryController@BidInfo');



