<?php

namespace App\Http\Controllers;

use App\Mail\SendPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;


class Userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('first_name', 'asc');

        if (request('query')) {
            $users->where('first_name', 'like', '%'.request('query').'%')
                ->where('email', 'like', '%'.request('query').'%');
        }

        return view('users.index', [
            'users' => $users->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form', [
            'user' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
        $pass = str_random(20);

        $user = new User($request->all());
        $user->password = bcrypt($pass);
        $user->save();


        Mail::to($user)->send(new SendPassword($user, $pass));

        return redirect('/adminusers')->with('success', 'user successfully added');

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
    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->fill($request->all());
        $user->save();


        return redirect()->route('adminusers')->with('edited', 'user is successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $users = count(User::all());

        if($users > 1){
            $user->delete();
        }

        return redirect('/adminusers')->with('success', 'User is successfully deleted!');
    }
    public function forgetPassword(){

        $users = User::all();

        return view('pages.forgetPassword', compact('users'));


    }

}
