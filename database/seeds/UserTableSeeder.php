<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:00
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name'     => 'admin',
                'email'    => 'cefalo19@gmail.com',
                'password' => Hash::make('123456')
            ]
        );

        factory('CodeCommerce\User', 10)->create();
    }

} 