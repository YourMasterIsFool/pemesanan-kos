<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $ROLE_ADMIN = 1;
    private $ROLE_PEMILIK = 2;
    private $ROLE_PENYEWA = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::create([
            'nama' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
        $user_admin->roles()->attach($this->ROLE_ADMIN);

        $user_pemilik = User::create([
            'nama' => 'Pemilik User',
            'email' => 'pemilik@gmail.com',
            'nik' => '1234567',
            'password' => Hash::make('pemilik')
        ]);
        $user_pemilik->roles()->attach($this->ROLE_PEMILIK);
    }
}
