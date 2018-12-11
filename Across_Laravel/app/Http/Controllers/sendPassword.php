<?php

namespace App\Http\Controllers;

use App\Mail\forgetPassword;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class sendPassword extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.forgetPassword', compact('users'));

    }
    public function sendPassword()
    {
        //$email = DB::select('select * from users where email = ?');
        //$user = Auth::user();

            $email = request()->input('email');
            $users = User::where('email', $email)->first();
            if ($users) {
                $pass = str_random(20);
                Mail::to($users)->send(new forgetPassword($users, $pass));

                $CrptPass = bcrypt($pass);

                $users->password = $CrptPass;
                $users->save();
                return redirect()->route('forgetPassword')->with('email_send', 'Check your mailbox ');

            }
            //return view('pages.sendPassword');
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
