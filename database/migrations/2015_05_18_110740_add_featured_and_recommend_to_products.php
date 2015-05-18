<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedAndRecommendToProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function($table) {
            $table->boolean('featured')->nullable();
            $table->boolean('recommend')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function($table) {
            $table->dropColumn('featured');
            $table->dropColumn('recommend');
        });
	}

}
