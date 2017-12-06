<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('admin_roles')->insert([
            'nombre' => 'Admin',
        ]);
        DB::table('admin_roles')->insert([
            'nombre' => 'Cobrador',
        ]);
        DB::table('users')->insert([
            'name' => 'Adminsis',
            'email' => 'adminsis1@test.com',
            'rol_id' => 1,
            //'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
        DB::table('users')->insert([
            'name' => 'Negro',
            'email' => 'movil1@test.com',
            'rol_id' => 2,
            //'created_at' => date('Y-m-d'),
            'password' => bcrypt('123456a'),
        ]);
    }
}
