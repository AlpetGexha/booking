<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AmenitySeeder::class,
            RoomTypeSeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            BookingSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
