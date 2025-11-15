<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'nama' => 'Admin Smartnesa',
            'username' => 'admin',
            'univ' => 'Universitas Negeri Surabaya',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => '2020',
            'email' => 'admin@smartnesa.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Mentor User
        User::create([
            'nama' => 'Dr. Budi Mentor',
            'username' => 'mentor',
            'univ' => 'Universitas Negeri Surabaya',
            'jurusan' => 'Sistem Informasi',
            'angkatan' => '2018',
            'email' => 'mentor@smartnesa.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mentor123'),
            'role' => 'mentor',
        ]);

        // Regular User
        User::create([
            'nama' => 'Siftiyan Abdullah Zidan Arzaqi',
            'username' => 'zidan',
            'univ' => 'Universitas Negeri Surabaya',
            'jurusan' => 'S1 Sistem Informasi',
            'angkatan' => '2022',
            'email' => 'user@smartnesa.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        $this->command->info('✅ Users seeded successfully!');
        $this->command->info('');
        $this->command->info('Login Credentials:');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('ADMIN:');
        $this->command->info('  Email: admin@smartnesa.com');
        $this->command->info('  Password: admin123');
        $this->command->info('');
        $this->command->info('MENTOR:');
        $this->command->info('  Email: mentor@smartnesa.com');
        $this->command->info('  Password: mentor123');
        $this->command->info('');
        $this->command->info('USER:');
        $this->command->info('  Email: user@smartnesa.com');
        $this->command->info('  Password: user123');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
    }
}
