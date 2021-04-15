<?php

namespace App\Http\Controllers;
use App\Model\CountryLiving;
use Auth;
use Illuminate\Http\Request;

use App\Model\Notice;

use App\Model\User;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
                    ->with('title','Home');
    }

    public function about()
    {
        $countrylivings = Cache::has('country_livings') ? Cache::get('country_livings') : null;
        if(is_null($countrylivings)) {
            $countrylivingsFromDb = CountryLiving::where('status', true)->get();
            Cache::put('country_livings', $countrylivingsFromDb,  3*24*60); // 3 days
            $countrylivings = $countrylivingsFromDb;
        }
        return view('about')
            ->with('title','About')
            ->with('countrylivings',$countrylivings);
    }

    public function credit()
    {
        return view('credit')
            ->with('title','Credit');
    }

    public function index2()
    {
        // return $notices = Notice::all();
        // return redirect()->route('login');
        return view('index')
                    ->with('title','Home');
    }
    

    public function profile()
    {
        $users = User::take(53)->skip(1)->get();

        return view('profile')
                    ->with('title','Profile')
                    ->with('users', $users);
    }


    public function dashboard(){
        $notices = Notice::take(5)->get();
        return view('dashboard')
                    ->with('title','Dashboard')
                    ->with('notices', $notices)
                    ->with('user', Auth::user());
        // return 'Dashboard';
    }
    
    public function cvProfile($username)
    {
        // return Skill::all();
        $user = User::where('username', $username)->with('profile')->with('skills')->first();
        return view('cvProfile')
                    ->with('user', $user);
    }

}
