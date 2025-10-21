<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\TicketController;


Route::get('/', function () {
    return redirect()->route('customer.ticket.index');
});

Route::get('/ticket-form', [TicketController::class, 'index'])->name('customer.ticket.index');
