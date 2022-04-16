<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            ['nama' => 'Asman Utama',
            'alamat_rumah' => 'Jln. Bayan No. 733, Pematangsiantar 82929, Banten',
            'handphone' => '081233234125'
            ],
            ['nama' => 'Ian Saragih',
            'alamat_rumah' => 'Jln. Bagas Pati No. 907, Bandar Lampung 22310, Riau',
            'handphone' => '081123245657'
            ]
        ]);
    }
}
