<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
   


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
        Product::create([
            'nombre' => 'Producto '.$i,
            'descripcion' => 'Descripcion del producto '.$i,
            'precio' => mt_rand(1, 1000)/100]);
        }
    }
}
