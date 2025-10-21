<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = User::role('manager')->first();
        $customers = User::role('customer')->get();

        foreach ($customers as $customer) {
            Ticket::query()->create([
                'customer_id' => $customer->id,
                'manager_id' => $manager->id,
                'title' => "Support request from {$customer->name}",
                'text' => 'Hello, I need help with my account.',
                'status' => 'new',
                'manager_reply_date' => Carbon::now()->subDays(rand(0, 5)),
            ]);
        }
    }
}
