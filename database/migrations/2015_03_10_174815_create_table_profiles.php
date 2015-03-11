<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Profile;

class CreateTableProfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $model = new Profile();
        Schema::create($model->getTable(), function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('zipcode')->default('');
            $table->date('birthday');
            $table->timestamps();
        });
        Schema::table($model->getTable(), function($table){
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        $model = new Profile();
        Schema::drop($model->getTable());
	}

}
