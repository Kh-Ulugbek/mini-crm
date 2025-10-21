<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(TicketRequest $request)
    {
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make('password'),
            ]
        );
        $user->assignRole('customer');

        // 2. Ariza yaratamiz
        $ticket = Ticket::create([
            'customer_id' => $user->id,
            'title' => $request->title,
            'text' => $request->text,
            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ariza muvaffaqiyatli yuborildi.',
            'data' => new TicketResource($ticket),
        ]);
    }

    /**
     * Statistikani olish (kunlik, haftalik, oylik)
     */
    public function statistics(Request $request)
    {
        $today = now()->startOfDay();
        $weekAgo = now()->subDays(7);
        $monthAgo = now()->subDays(30);

        return response()->json([
            'day' => Ticket::where('created_at', '>=', $today)->count(),
            'week' => Ticket::where('created_at', '>=', $weekAgo)->count(),
            'month' => Ticket::where('created_at', '>=', $monthAgo)->count(),
        ]);
    }
}
