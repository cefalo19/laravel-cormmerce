<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:01
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 20)->create();
    }
} 