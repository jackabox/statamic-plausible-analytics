<?php

Route::get('/analytics', 'DashboardController@index')->name('plausible.index');

Route::get('/plausible/api/top-pages', 'Api\TopPagesController@fetch')->name('plausible.api.top-pages');
Route::get('/plausible/api/top-referrers', 'Api\TopReferrersController@fetch')->name('plausible.api.top-referrers');
Route::get('/plausible/api/top-browsers', 'Api\TopBrowsersController@fetch')->name('plausible.api.top-browsers');
Route::get('/plausible/api/timeseries', 'Api\TimeseriesController@fetch')->name('plausible.api.timeseries');
Route::get('/plausible/api/aggregates', 'Api\AggregatesController@fetch')->name('plausible.api.aggregates');
