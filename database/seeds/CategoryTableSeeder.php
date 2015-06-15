<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:00
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 5)->create();
    }

} 