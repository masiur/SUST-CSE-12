<?php

use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name',config('customConfig.roles.admin'))->first();
        $user = Role::where('name',config('customConfig.roles.user'))->first();
        $adminUser1 = User::where('username', 'masiur')->first();
//        $adminUser2 = User::find(2);
        $adminUser1->attachRole($admin);
//        $adminUser2->attachRole($admin);
        $getAllusers = User::all();
        foreach ($getAllusers as $person) {
            $person->attachRole($user);
        }
    }
}
