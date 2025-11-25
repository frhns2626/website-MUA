<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@firliamakeup.com')->exists();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Admin Firliamakeup',
                'email' => 'admin@firliamakeup.com',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@firliamakeup.com');
            $this->command->info('Password: admin123');
            $this->command->warn('Please change the password after first login!');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
