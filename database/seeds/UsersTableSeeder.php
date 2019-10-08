<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// usuario con rol admin

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('super-admin');
        // usuario con rol coordinador

        $coordinador = User::create([
            'name' => 'coordinador',
            'email' => 'coordinador@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $coordinador->assignRole('coordinator');

        // usuario con rol user

        $usuario = User::create([
            'name' => 'usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $usuario->assignRole('user');


    }
}
