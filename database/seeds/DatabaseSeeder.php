<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Nancy',
            'email' => 'nancy@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        DB::table('users')->insert([
            'name' => 'Andres',
            'email' => 'andres@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        DB::table('users')->insert([
            'name' => 'Consignación',
            'email' => 'consignacion@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        DB::table('users')->insert([
            'name' => 'Chango',
            'email' => 'chango@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cobrador']);
        $user = App\User::find(1);
        $user->assignRole('Administrador');
        $user = App\User::find(2);
        $user->assignRole('Administrador');
        $user = App\User::find(3);
        $user->assignRole('Cobrador');
        $user = App\User::find(4);
        $user->assignRole('Cobrador');
        
    }
}
