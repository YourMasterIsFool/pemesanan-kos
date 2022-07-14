<?php

namespace Database\Seeders;

use App\Models\TipeKos;
use Illuminate\Database\Seeder;

class TipeKosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeKos::create([
            'tipe' => 'Laki - Laki'
        ]);

        TipeKos::create([
            'tipe' => 'Perempuan'
        ]);
    }
}
