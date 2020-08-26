<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::UpdateOrCreate(['id' => 3], ['name' => 'Jeppevinkel', 'email' => 'jeppevinkel@gmail.com', 'email_verified_at' => '2020-08-26 14:55:23', 'password' => '$2y$10$15lmyhc.ip3iU1FOwfXC/.lgKj.AsMye5vc/EypVQf3uopWmkULOG', 'remember_token' => 'MKtTe28hFbeQ3eF8vTIl0Y0y497gahw084KvL8iCvLsLCwQ9nepzIkSwRtrY', 'created_at' => '2020-08-26 14:52:13', 'updated_at' => '2020-08-26 14:55:23']);
    }
}
