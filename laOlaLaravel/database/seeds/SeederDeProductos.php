<?php

use Illuminate\Database\Seeder;

class SeederDeProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
              'name' => 'Hamburguesa de Arvejas',
              'description' => 'Arvejas, vegetales, harina de maiz, fecula de mandioca, sal marina, especias.',
              'price' => 120,
              'avatar' => '/combo1.jpg',
              'avatar1' => '/combo1.jpg',
              'avatar2' => '/combo1.jpg',
              'avatar3' => '/combo1.jpg',
              'avatar4' => '/combo1.jpg',
            ]
        );

        DB::table('products')->insert(
            [
              'name' => 'Hamburguesa de Lentejas',
              'description' => 'Lentejas, vegetales, fecula de mandioca, sal marina, especias.',
              'price' => 180,
              'avatar' => '/combo2.jpg',
              'avatar1' => '/combo2.jpg',
              'avatar2' => '/combo2.jpg',
              'avatar3' => '/combo2.jpg',
              'avatar4' => '/combo2.jpg',
            ]
        );

        DB::table('products')->insert(
            [
                'name' => 'Hamburguesa de Calabaza',
                'description' => 'Calabaza, vegetales, harina de maiz, fecula de mandioca, sal marina, especias.',
                'price' => 180,
                'avatar' => '/combo3.jpg',
                'avatar1' => '/combo3.jpg',
                'avatar2' => '/combo3.jpg',
                'avatar3' => '/combo3.jpg',
                'avatar4' => '/combo3.jpg',
            ]
        );
         DB::table('products')->insert(
            [
                'name' => 'Hamburguesa de Espinaca',
                'description' => 'Espinaca, acelga, vegetales, fecula de mandioca, sal marina, especias.',
                'price' => 180,
                'avatar' => '/combo4.jpg',
                'avatar1' => '/combo4.jpg',
                'avatar2' => '/combo4.jpg',
                'avatar3' => '/combo4.jpg',
                'avatar4' => '/combo4.jpg',
            ]
        );     
        DB::table('products')->insert(
            [
                'name' => 'Hamburguesa de Arroz',
                'description' => 'Arroz, vegetales, semillas de lino, harina de maiz, fecula de mandioca, sal marina, especias.',
                'price' => 210,
                'avatar' => '/combo5.jpg',
                'avatar1' => '/combo5.jpg',
                'avatar2' => '/combo5.jpg',
                'avatar3' => '/combo5.jpg',
                'avatar4' => '/combo5.jpg',
            ]
        );
        DB::table('products')->insert(
            [
                'name' => 'Hamburguesa de Quinoa',
                'description' => 'Quinoa, vegetales, jengibre, fecula de mandioca, sal marina, especias.',
                'price' => 180,
                'avatar' => '/combo6.jpg',
                'avatar1' => '/combo6.jpg',
                'avatar2' => '/combo6.jpg',
                'avatar3' => '/combo6.jpg',
                'avatar4' => '/combo6.jpg',
            ]
        );
        DB::table('products')->insert(
            [
                'name' => 'Hamburguesa de Garbanzos',
                'description' => 'Garbanzos, vegetales, harina de maiz,fecula de mandioca, sal marina, especias.',
                'price' => 180,
                'avatar' => '/combo1.jpg',
                'avatar1' => '/combo1.jpg',
                'avatar2' => '/combo1.jpg',
                'avatar3' => '/combo1.jpg',
                'avatar4' => '/combo1.jpg',
            ]
        );

    }
}