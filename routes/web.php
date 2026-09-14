<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('close/{ticket}', 'closeTicket')->name('close');
    Route::get('download/{ticket}', 'ticketDownload')->name('download');
});


Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {

    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::get('terms', 'SiteController@terms')->name('terms');
    Route::get('privacy', 'SiteController@privacy')->name('privacy');
    Route::get('about', 'SiteController@about')->name('about');
    Route::get('blog', 'SiteController@blog')->name('blog');
    Route::get('sitemap.xml', 'SiteController@sitemap')->name('sitemap');

   

    // Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
    Route::get('/feed', 'feed')->name('feed');


    Route::get('/{slug}', 'SiteController@postDetails')->name('postDetails');
});


