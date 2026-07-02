<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjerciciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ejercicios')->insert([
            [
                'titulo' => 'Estiramiento lumbar en decúbito',
                'descripcion' => 'Reduce la tensión lumbar y mejora la movilidad de la columna baja.',
                'lesion_recomendada' => 'Espalda',
                'dificultad' => 'Básico',
                'duracion' => '10 min',
                'repeticiones' => '3 x 30s',
                'imagen_url' => '[https://images.unsplash.com/photo-1540206276207-3af25c08abc4?w=400&h=260&fit=crop&auto=format](https://images.unsplash.com/photo-1540206276207-3af25c08abc4?w=400&h=260&fit=crop&auto=format)'
            ],
            [
                'titulo' => 'Movilización pendular de Codman',
                'descripcion' => 'Recupera el rango de movimiento glenohumeral sin carga articular.',
                'lesion_recomendada' => 'Hombro',
                'dificultad' => 'Básico',
                'duracion' => '8 min',
                'repeticiones' => '2 x 20 rep',
                'imagen_url' => '[https://images.unsplash.com/photo-1645005513713-9e2b92a687d3?w=400&h=260&fit=crop&auto=format](https://images.unsplash.com/photo-1645005513713-9e2b92a687d3?w=400&h=260&fit=crop&auto=format)'
            ]
        ]);
    }

}
