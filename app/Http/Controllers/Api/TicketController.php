<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    /**
     * Create User and Ticket
     */
    public function store(TicketRequest $request)
    {
        $user = User::query()->firstOrCreate(
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
            'message' => 'Ticket successfully created',
            'data' => new TicketResource($ticket),
        ]);
    }

    /**
     * Statistics
     */
    public function statistics(Request $request)
    {
        $today = now()->startOfDay();
        $weekAgo = now()->subDays(7);
        $monthAgo = now()->subDays(30);

        return response()->json([
            'day' => Ticket::query()->where('created_at', '>=', $today)->count(),
            'week' => Ticket::query()->where('created_at', '>=', $weekAgo)->count(),
            'month' => Ticket::query()->where('created_at', '>=', $monthAgo)->count(),
        ]);
    }
}
