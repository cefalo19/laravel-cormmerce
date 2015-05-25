<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 22/05/15
 * Time: 12:00
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name'     => 'admin',
            'email'    => 'cefalo19@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 9; $i++) {
            User::create([
                'name'     => $faker->firstName,
                'email'    => $faker->email,
                'password' => Hash::make($faker->word)
            ]);
        }
    }

} 