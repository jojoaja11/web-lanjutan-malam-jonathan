<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@example.test',
            'password'=>Hash::make('password'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'Dosen',
            'email'=>'dosen@example.test',
            'password'=>Hash::make('password'),
            'role'=>'dosen'
        ]);

        User::create([
            'name'=>'Mahasiswa',
            'email'=>'mhs@example.test',
            'password'=>Hash::make('password'),
            'role'=>'mahasiswa'
        ]);
    }
}
