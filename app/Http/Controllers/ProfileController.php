<?php

namespace App\Http\Controllers;

use App\Model\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use View;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\User;
use App\Http\Requests\PhotoRequest;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{



    /**
     * Display the profile Info.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile =Profile::where('user_id',Auth::user()->id)->first();
        return view('auth.profile')
            ->with('title', 'Profile')
            ->with('user', Auth::user())
            ->with('profile', $profile);
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        try{
            Profile::where('id','=',Auth::user()->id)->update([
                'name'=>  $request->name,
                'gender'=> $request->gender,
                'dob'=> $request->dob,
                'address'=> $request->address,
                'phone'=> $request->phone,
                'github_link'=> $request->github_link,
                'fb_link'=> $request->fb_link,
                'linkedin_link'=> $request->linkedin_link,
                'website'=> $request->website,
                'workingPlatform'=> $request->workingPlatform,
                
                'interests'=> $request->interests,
                'aboutme'=> $request->aboutme,
            ]);

            return Redirect::route('profile')->with('success','Profile updated Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error','Something went wrong, Please try Again.');
        }

    }







    /**
     * Update PROFILE photo.
     *
     * @param PhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function photoUpload(PhotoRequest $request){


        if ($request->hasFile('image'))
        {
            $image = $request->file('image');


            //deleting previous file
            $prev_avatar_url = Auth::user()->profile->img_url;
            if($prev_avatar_url != 'upload/profile/default/avatar.jpg'){
                if (\File::exists($prev_avatar_url)) {
                    \File::delete($prev_avatar_url);
                }

            }

            $avatar_url = 'upload/profile/avatar/avatar-'.Auth::user()->id. '.' . $image->getClientOriginalExtension();


            Image::make($image)->resize(200, 200)->save(public_path($avatar_url));


            $profile = Profile::where('user_id',Auth::user()->id)
                ->update(array(
                    'img_url' => $avatar_url,
                ));

            if($profile){
                return redirect()->back()->with('success','Avatar updated successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

        }else{

            return redirect()->back()->with(['error'=>'Image could not be uploaded']);
        }
    }

    public function cvUpload(Request $request){


        if ($request->hasFile('cvfile'))
        {
            $tmpfile = $request->file('cvfile');


            //deleting previous file
            $prev_cv_url = Auth::user()->profile->cv;
            // if($prev_cv_url != 'upload/profile/default/avatar.jpg'){
            //     if (\File::exists($prev_cv_url)) {
            //         \File::delete($prev_cv_url);
            //     }

            // }
            $destination = public_path().'/uploads/cvfiles';
            $file_name = Auth::user()->username. '_cv';
           
            $filename = $file_name.'.'.$tmpfile->getClientOriginalExtension();
            $tmpfile->move($destination, $filename);
            $file_link = '/uploads/cvfiles/'.$filename;


            $profile = Profile::where('user_id',Auth::user()->id)
                ->update(array(
                    'cv' => $file_link,
                ));

            if($profile){

                $prev_cv_url = Auth::user()->profile->cv;
                
                    if (\File::exists($prev_cv_url)) {
                        \File::delete($prev_cv_url);
                    }
                

            
                return redirect()->back()->with('success','CV updated successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

        }else{

            return redirect()->back()->with(['error'=>'CV could not be uploaded']);
        }
    }

    public function rawdata()
    {
         
        // Profile::create(['user_id'=> 1]);
        // Profile::create(['user_id'=> 2]);
        // Profile::create(['user_id'=> 3]);

        $csv = array_map('str_getcsv', file(public_path('upload/data.csv')));
        foreach ($csv as $key => $value) {
            if ($key != 0) {

                 // This code was to test that this works or not 
                // echo "<center>";
                echo "<i>".$value[0]."</i><br>"; // reg
                echo $value[1]."<br>"; // email
                echo $value[2]."<br>"; // sustmail
                echo  "<strong>".$value[3]." ".$value[4]."</strong><br>";; // firstname & firstname
                // echo $value[4]."<br>"; // lastname 
                echo $value[5]."<br>"; // mobile
                echo $value[6]."<br>"; // dept
                echo $value[7]."<br>"; // sesion
                // echo $value[8]."<br>";
                // echo "</center>";
                echo "<hr>";
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

      
    
    }

}
