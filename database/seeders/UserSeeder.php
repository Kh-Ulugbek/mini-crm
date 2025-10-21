<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manager
        $manager = User::query()->firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Test Manager',
                'password' => Hash::make('password'),
                'phone' => null,
            ]
        );
        $manager->assignRole('manager');

        // customer
        for ($i = 1; $i <= 3; $i++) {
            $customer = User::query()->create([
                'name' => "Customer $i",
                'email' => "customer$i@example.com",
                'phone' => '+99890123456' . $i,
                'password' => Hash::make('password'),
            ]);
            $customer->assignRole('customer');
        }
    }
}
