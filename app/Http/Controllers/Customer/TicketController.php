<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function widget(): View
    {
        return view('customer.ticket.widget');
    }
}
