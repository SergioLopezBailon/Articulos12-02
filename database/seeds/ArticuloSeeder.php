<?php

use Illuminate\Database\Seeder;
use App\Articulo;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create([
            'nombre'=>'Ordenador',
            'categoria'=>'Electronica',
            'precio'=>'900',
            'stock'=>'10'
        ]);
        Articulo::create([
            'nombre'=>'Mesa',
            'categoria'=>'Hogar',
            'precio'=>'40',
            'stock'=>'24'
        ]);
        Articulo::create([
            'nombre'=>'Maceta',
            'categoria'=>'Bazar',
            'precio'=>'7',
            'stock'=>'60'
        ]);
        Articulo::create([
            'nombre'=>'Altavoz',
            'categoria'=>'Electronica',
            'precio'=>'100',
            'stock'=>'38'
        ]);
        Articulo::create([
            'nombre'=>'Movil',
            'categoria'=>'Electronica',
            'precio'=>'150',
            'stock'=>'60'
        ]);
        Articulo::create([
            'nombre'=>'Lámpara',
            'categoria'=>'Hogar',
            'precio'=>'40',
            'stock'=>'90'
        ]);
        Articulo::create([
            'nombre'=>'Raton',
            'categoria'=>'Electronica',
            'precio'=>'40',
            'stock'=>'20'
        ]);
        Articulo::create([
            'nombre'=>'Cortina',
            'categoria'=>'Hogar',
            'precio'=>'15',
            'stock'=>'80'
        ]);
        Articulo::create([
            'nombre'=>'Pendientes',
            'categoria'=>'Bazar',
            'precio'=>'5',
            'stock'=>'90'
        ]);
        Articulo::create([
            'nombre'=>'Herramientas',
            'categoria'=>'Bazar',
            'precio'=>'25',
            'stock'=>'35'
        ]);
    }
}
