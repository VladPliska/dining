<?php

use Illuminate\Database\Seeder;
use App\Models\User as us;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = hash('md5','qwerty');
        us::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' =>$pass
        ]);
    }
}
