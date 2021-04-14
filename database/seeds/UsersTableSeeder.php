<?php

use App\Model\User;
use App\Model\Profile;
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
        // {   
        //     $user = new User();
        //     $user->username = 'masiur';
        //     $user->email = 'mrsiddiki@gmail.com';
        //     $user->password = bcrypt('a');
        //     $user->created_at = date('Y-m-d H:i:s');
        //     $user->updated_at = date('Y-m-d H:i:s');
        //     $user->save();
        //     $profile = new Profile();
        //     $profile->user_id = $user->id;
        //     $profile->name = 'Masiur Rahman Siddiki';
        //     $profile->save();

//        User::create(['username' => 'masiur','email' => 'mrsiddiki@outlook.com','password' => bcrypt('a')]);
//        Profile::create(['user_id' => 1, 'name' => 'Masiur Rahman Siddiki']);
        // User::create(['username' => 'tal','email' => 'talhaqc@gmail.com','password' => bcrypt('a')]);
        //Use this user for login as user
       


        //creating 10 test users
        // factory(User::class,10)->create();



    }
}
