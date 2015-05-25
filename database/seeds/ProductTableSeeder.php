<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:01
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name'        => $faker->word,
                'description' => $faker->sentence,
                'price'       => $faker->randomNumber,
                'featured'    => $faker->randomElement(array(null, 1)),
                'recommend'   => $faker->randomElement(array(null, 1))
            ]);
        }
    }
} 