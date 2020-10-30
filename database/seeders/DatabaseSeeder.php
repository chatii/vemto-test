<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(PostSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
    }
}
