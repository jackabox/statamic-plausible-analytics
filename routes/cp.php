<?php

use Jackabox\Plausible\Http\Controllers\DashboardController;
use Jackabox\Plausible\Http\Controllers\Api\TopPagesController;
use Jackabox\Plausible\Http\Controllers\Api\TopReferrersController;
use Jackabox\Plausible\Http\Controllers\Api\TopBrowsersController;
use Jackabox\Plausible\Http\Controllers\Api\TimeseriesController;
use Jackabox\Plausible\Http\Controllers\Api\AggregatesController;

Route::get('/analytics', [DashboardController::class, 'index'])->name('plausible.index');

Route::get('/plausible/api/top-pages', [TopPagesController::class, 'fetch'])->name('plausible.api.top-pages');
Route::get('/plausible/api/top-referrers', [TopReferrersController::class, 'fetch'])->name('plausible.api.top-referrers');
Route::get('/plausible/api/top-browsers', [TopBrowsersController::class, 'fetch'])->name('plausible.api.top-browsers');
Route::get('/plausible/api/timeseries', [TimeseriesController::class, 'fetch'])->name('plausible.api.timeseries');
Route::get('/plausible/api/aggregates', [AggregatesController::class, 'fetch'])->name('plausible.api.aggregates');
