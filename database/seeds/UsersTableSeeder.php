<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    DB::table('users')->insert([
      'name' => 'Jonny Alexander',
      'email' => 'jonnyalex.bh@gmail.com',
      'password' => app('hash')->make('secret')
    ]);

    DB::table('users')->insert([
      'name' => 'Juan David',
      'email' => 'juan@gmail.com',
      'password' => app('hash')->make('secret')
    ]);

  }
}
