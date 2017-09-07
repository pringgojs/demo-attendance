<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::table('users')->truncate();

        $user = new User;
        $user->name = 'admin';
        $user->email = 'odyinggo@gmail.com';
        $user->password = bcrypt('a');
        $user->save();
        
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
