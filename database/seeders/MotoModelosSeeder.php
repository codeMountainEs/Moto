<?php

namespace Database\Seeders;

use App\Models\ModeloMoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotoModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelosKawasaki = [
            'Ninja ZX-10R',
            'Ninja ZX-6R',
            'Ninja 400',
            'Ninja ZX-25R',
            'Versys 1000',
            'Versys 650',
            'Z900',
            'Z650',
            'Z H2',
            'Vulcan S',
            'Vulcan 1600',
            'W800',
        ];

        $marcaKawasaki = \App\Models\Marca::where('nombre', 'Kawasaki')->first();

        if ($marcaKawasaki) {
            foreach ($modelosKawasaki as $modelo) {
                ModeloMoto::create([
                    'nombre' => $modelo,
                    'marca_id' => $marcaKawasaki->id,
                ]);
            }
        } else {
            echo "La marca Kawasaki no existe en la base de datos.";
        }
    }
}
