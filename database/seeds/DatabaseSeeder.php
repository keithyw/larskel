<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('UserTableSeeder');
	}

}


class UserTableSeeder extends Seeder{
    public function run(){
        $user = new User();
        DB::table($user->getTable())->delete();
        User::create(['name' => 'test', 'email' => 'test@test.com', 'password' => bcrypt('test123')]);
        User::create(['name' => 'test2', 'email' => 'test2@test.com', 'password' => bcrypt('test123')]);
    }
}