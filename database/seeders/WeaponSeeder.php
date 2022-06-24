<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weapon::factory()
            ->count(50)
            ->create();
    }
}
