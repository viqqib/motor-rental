<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorsTableSeeder extends Seeder
{
    public function run()
    {
        $motors = [
            [
                'nomor_plat' => 'AB 1683 DC',
                'tipe' => 'Adventure',
                'merek' => 'Yamaha',
                'tahun' => 2012,
                'warna' => 'Blue',
                'status' => 'tidak tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 4032 FA',
                'tipe' => 'Sport',
                'merek' => 'Yamaha',
                'tahun' => 2024,
                'warna' => 'White',
                'status' => 'perawatan',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 7703 XY',
                'tipe' => 'Touring',
                'merek' => 'Honda',
                'tahun' => 2013,
                'warna' => 'White',
                'status' => 'Tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 8002 RL',
                'tipe' => 'Cruiser',
                'merek' => 'Suzuki',
                'tahun' => 2016,
                'warna' => 'Yellow',
                'status' => 'perawatan',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 7806 GT',
                'tipe' => 'Adventure',
                'merek' => 'BMW',
                'tahun' => 2022,
                'warna' => 'Red',
                'status' => 'tidak tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 6571 ST',
                'tipe' => 'Sport',
                'merek' => 'BMW',
                'tahun' => 2010,
                'warna' => 'Black',
                'status' => 'Tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 4191 LT',
                'tipe' => 'Touring',
                'merek' => 'Yamaha',
                'tahun' => 2018,
                'warna' => 'Orange',
                'status' => 'tidak tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 8953 YK',
                'tipe' => 'Sport',
                'merek' => 'Yamaha',
                'tahun' => 2022,
                'warna' => 'Orange',
                'status' => 'tidak tersedia',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 3759 UB',
                'tipe' => 'Adventure',
                'merek' => 'Yamaha',
                'tahun' => 2015,
                'warna' => 'White',
                'status' => 'perawatan',
                'gambar' => null,
            ],
            [
                'nomor_plat' => 'AB 3754 FK',
                'tipe' => 'Sport',
                'merek' => 'Kawasaki',
                'tahun' => 2021,
                'warna' => 'Blue',
                'status' => 'perawatan',
                'gambar' => null,
            ]
        ];

        DB::table('motors')->insert($motors);
    }
}
