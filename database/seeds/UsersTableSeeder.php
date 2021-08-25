<?php

use App\User;
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
        User::create([
            'name'      =>  'Luis Lopez',
            'email'     =>  'luisefrain1985@gmail.com',
            'password'  =>  bcrypt('123456'),
        ]);

        User::create([
            'name'      =>  'Carlos Alvear',
            'email'     =>  'carlos@gmail.com',
            'password'  =>  bcrypt('123456'),
        ]);
    }
}
