<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:00
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->truncate();

        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'name'        => $faker->word,
                'description' => $faker->sentence()
            ]);
        }
    }

} 