<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Notice;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Skill;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
