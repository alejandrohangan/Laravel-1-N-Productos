<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Alimentos' => '#FF8A80',  // Rojo claro
            'Bebidas' => '#FF80AB',   // Rosa claro
            'Electrónica' => '#82B1FF', // Azul claro
            'Ropa' => '#B9F6CA',      // Verde claro
            'Juguetes' => '#FFD740',  // Amarillo claro
        ];

        // Ordenar alfabéticamente las categorías por nombre
        ksort($categories);

        // Crear las categorías en la base de datos
        foreach ($categories as $nombre => $color) {
            Category::create(compact('nombre', 'color'));
        }
    }
}
