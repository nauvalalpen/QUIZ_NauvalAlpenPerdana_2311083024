<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // This makes the email verified
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(), // This makes the email verified
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample News (optional)
        Berita::create([
            'title' => 'Laravel 11 Released with Amazing New Features',
            'content' => 'Laravel 11 has been released with many exciting new features including improved performance, better developer experience, and enhanced security measures. This release brings significant improvements to the framework that developers have been waiting for.',
            'photo' => 'photos/sample1.jpg',
            'author' => 'John Doe',
            'user_id' => $admin->id,
        ]);

        Berita::create([
            'title' => 'Understanding Modern Web Development Trends in 2024',
            'content' => 'Web development continues to evolve rapidly in 2024. From AI integration to improved user experiences, developers need to stay updated with the latest trends and technologies to remain competitive in the market.',
            'photo' => 'photos/sample2.jpg',
            'author' => 'Jane Smith',
            'user_id' => $admin->id,
        ]);
    }
}
