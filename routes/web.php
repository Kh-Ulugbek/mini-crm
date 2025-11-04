<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\TicketController;
use Livewire\WithPagination;


Route::get('/', function () {
    return redirect()->route('customer.ticket.widget');
});

Route::get('/widget', [TicketController::class, 'widget'])->name('customer.ticket.widget');

//Route::prefix('admin')->group(['middleware' => ['role:admin']], function () {
//    Route::view('/widget-list', '/admin/pages/widget/widget-list')->name('admin.widget.list');
//});

Route::view('/widget-list', '/admin/pages/widget/widget-list')->name('admin.widget.list');
Route::view('/login', '/auth/login')->name('admin.widget.login');
