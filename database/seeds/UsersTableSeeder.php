<?php

use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'agnin',
            'email' => 'agnin_ehounou@yahoo.fr',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'remember_token' => str_random(10),
            'avatar'=>'public/avatars/male.jpg',
            'gender'=>1,
            'slug'=>'agnin'
        ]
        );
        Profile::create(['user_id'=>$user->id,'profile_image'=>'public/avatars/male.jpg']);
    }
}
