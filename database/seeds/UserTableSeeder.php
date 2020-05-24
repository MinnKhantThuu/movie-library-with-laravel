<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path() . '/files/user.json';
        $content = file_get_contents($path);
        $users = json_decode($content);
        foreach($users as $user){
            User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>bcrypt($user->password)
            ]);
        }
    }
}
