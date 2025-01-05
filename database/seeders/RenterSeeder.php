<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Renter;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Renter::create([
            'name' => 'John Doe',
            'email' => 'Johndoe@mail.com',
            'no_telp' => '081234567890',
            'no_identitas' => 'ID123456789',
            'address' => '123 Main Street, Springfield',
        ]);
    }
}
