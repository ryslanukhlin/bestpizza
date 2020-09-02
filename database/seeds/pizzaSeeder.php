<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class pizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1;$i<=30;$i++)
        {
            DB::table('pizzaitem')->insert([
                'title' => 'Пицца № '.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                 Exercitationem explicabo itaque soluta unde voluptatibus?',
                'price' => rand(1000,2000),
                'categoryName' => $this->getRandCategory(rand(1,4)),
                'imgIrl' => 'img/itempizza/'.rand(1,6).'.jpg'
            ]);
        }
    }

    public function getRandCategory(int $randInt):string
    {
         switch ($randInt) {
             case 1:
                 return "Сырная";
                 break;
             case 2:
                 return "Мясная";
                 break;
             case 3:
                 return "Фруктовая";
                 break;
             case 4:
                 return "Грибная";
                 break;
         }
    }
}
