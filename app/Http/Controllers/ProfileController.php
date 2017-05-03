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

}
