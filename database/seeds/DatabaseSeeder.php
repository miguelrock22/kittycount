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
            'name' => 'Adminsis',
            'email' => 'adminsis1@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        DB::table('users')->insert([
            'name' => 'Negro',
            'email' => 'movil1@test.com',
            'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cobrador']);
        $user = App\User::find(1);
        $user->assignRole('Administrador');
        $user = App\User::find(2);
        $user->assignRole('Cobrador');
        
    }
}
