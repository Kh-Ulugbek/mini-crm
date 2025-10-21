<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\TicketController;


Route::get('/', function () {
    return redirect()->route('customer.ticket.widget');
});

Route::get('/widget', [TicketController::class, 'widget'])->name('customer.ticket.widget');
