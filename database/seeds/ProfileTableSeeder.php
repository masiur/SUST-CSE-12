<?php

use Illuminate\Database\Seeder;
use App\Model\Profile;
use App\Model\User;
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Profile::create(['user_id'=> 1]);
        // Profile::create(['user_id'=> 2]);
        // Profile::create(['user_id'=> 3]);

        $csv = array_map('str_getcsv', file(public_path('upload/data2.csv')));
        foreach ($csv as $key => $value) {
            if ($key != 0) {

                /* This code was to test that this works or not 
                // $value[0]."<br>"; // reg
                // $value[1]."<br>"; // email
                // $value[2]."<br>"; // sustmail
                // $value[3]."<br>"; // firstname
                // $value[4]."<br>"; // lastname 
                // $value[5]."<br>"; // mobile
                // $value[6]."<br>"; // dept
                // $value[7]."<br>"; // sesion
                // // echo $value[8]."<br>";
                */

                //useful Code Segment 
                $user = new User();
                $user->username = $value[0];
                $user->email = $value[1];
                $user->password = bcrypt('ab');
                $user->sust_mail = $value[2];
                $user->email2 = null;
                $user->registration_no = $value[0];
                $user->created_at = date('Y-m-d H:i:s');
                $user->updated_at = date('Y-m-d H:i:s');
                $user->save();
                //creating corresponding profile
                $profile = new Profile();
                $profile->user_id = $user->id;
                $profile->phone = $value[5];
                $profile->name = $value[3].' '.$value[4]; // full name
                $profile->save();

            }
        }

        // $students = [ 
        //                 '2012331002',
        //                 '2012331005',
        //                 '2012331007',
        //                 '2012331008',
        //                 '2012331009',
        //                 '2012331012',
        //                 '2012331013',
        //                 '2012331014',
        //                 '2012331015',
        //                 '2012331016',
        //                 '2012331017',
        //                 '2012331019',
        //                 '2012331020',
        //                 '2012331023',
        //                 '2012331024',
        //                 '2012331025',
        //                 '2012331027',
        //                 '2012331029',
        //                 '2012331030',
        //                 '2012331031',
        //                 '2012331033',
        //                 '2012331034',
        //                 '2012331035',
        //                 '2012331039',
        //                 '2012331041',
        //                 '2012331043',
        //                 '2012331045',
        //                 '2012331046',
        //                 '2012331047',
        //                 '2012331048',
        //                 '2012331049',
        //                 '2012331051',
        //                 '2012331052',
        //                 '2012331054',
        //                 '2012331055',
        //                 '2012331056',
        //                 '2012331057',
        //                 '2012331059',
        //                 '2012331060',
        //                 '2012331062',
        //                 '2012331063',
        //                 '2012331064',
        //                 '2012331065',
        //                 '2012331066',
        //                 '2012331067',
        //                 '2012331068',
        //                 '2012331069',
        //                 '2012331070',
        //                 '2012331071',
        //                 '2012331072',
        //                 '2012331073',
        //                 '2012331074'
        //             ];

        // foreach ($students as  $studentReg) {  
        //     $user = new User();
        //     $user->username = $studentReg;
        //     $user->password = bcrypt('a');
        //     $user->created_at = date('Y-m-d H:i:s');
        //     $user->updated_at = date('Y-m-d H:i:s');
        //     $user->save();
        //     $profile = new Profile();
        //     $profile->user_id = $user->id;
        //     $profile->name = 'Masiur Rahman Siddiki';
        //     $profile->save();
        // }
    }
}







































































































































































































