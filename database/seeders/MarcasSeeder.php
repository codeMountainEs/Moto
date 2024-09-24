<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
        'Harley-Davidson',
        'Ducati',
        'BMW',
        'Yamaha',
        'Honda',
        'Suzuki',
        'Kawasaki',
        'KTM',
        'Triumph',
        'Aprilia',
        'Moto Guzzi',
        'Royal Enfield',
            'Vogue',
    ];

        foreach ($marcas as $marca) {
            Marca::create(['nombre' => $marca]);
        }
    }
}
