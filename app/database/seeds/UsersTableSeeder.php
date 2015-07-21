<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([

			]);
		}*/


        User::truncate();

        User::create(array(
            'username' => 'admin@api.com',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'facebook_id' => 'facebook_id',
            'password' => Hash::make('api')
        ));

        User::create(array(
            'username' => 'a@a.com',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'facebook_id' => 'facebook_id',
            'password' => Hash::make('a')
        ));

        User::create(array(
            'username' => 'firstuser',
            'first_name' => 'firstuser_first_name',
            'last_name' => 'firstuser_last_name',
            'password' => Hash::make('first_password')
        ));

        User::create(array(
            'username' => 'seconduser',
            'first_name' => 'seconduser_first_name',
            'last_name' => 'seconduser_last_name',
            'password' => Hash::make('second_password')
        ));
	}

}