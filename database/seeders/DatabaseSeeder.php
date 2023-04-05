<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categorie=[
            ['Auto', 'Voiture', '车'],
            ['Motori','Motors','引擎'],
            ['Informatica','IT','信息学'],
            ['Elettrodomestici', 'Appareils électroménagers','家用電器'],
            ['Telefonia','Téléphonie','=电话'],
            ['Games','Jeux','游戏'], 
            ['Sport','Sport','运动'], 
            ['Per la casa','Pour la maison','对于房子'],
            ['Animali','Animaux','=动物'],
            ['Hobby','Passe temps','愛好 '],
            ['Elettronica','électronique','电子产品'],
        ];
        
        $existingCategories=Category::all();
        
        foreach($existingCategories as $key=>$existingCategory){
            $existingCategory->update([
               'it'=>$categorie[$key][0],
               'fr'=>$categorie[$key][1],
               'zh'=>$categorie[$key][2],
            ]);
        }
    }
}
