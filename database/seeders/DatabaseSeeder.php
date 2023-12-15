<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        $id = Str::random('5');
        User::create(
            [
            'name' => 'user testing',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('user');
        User::create(
            [
            'name' => 'admin testing',
            'email' =>  'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('admin');
        Category::create([
            'category' => 'MPV'
        ]);
        Car::create(
            [
            'code' => $id,
            'name' => 'Toyota Alphard',
            'deskripsi' =>  'New Alphard memperoleh begitu banyak sentuhan inovasi, sehingga tidak hanya memberikan kenyamanan berkendara terbaik, MPV ini juga memperkuat positioning-nya di segmen luxury vehicle yang sangat eksklusif.',
            'id_category' => 1,
            'bbm' => 'Bensin',
            'harga' => 600000,
            'status' => 'Available',
        ]);
    }
}
