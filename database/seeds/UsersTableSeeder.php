<?php

use App\User;
use Carbon\Carbon;
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
        $user = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@10code.es',
            'password' => bcrypt('1234'),
            'email_verified_at' => Carbon::now()
        ]);

        $user->givePermissionTo(['create users', 'edit users', 'delete users', 'list users']);
    }
}
