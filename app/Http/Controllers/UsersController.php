<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function activity()
    {
        $users = User::all();
        return view('users.activity', ['users'=>$users]);
        
    }

    public function user(Request $request, $id)
    {
        if(isset($_POST['update']) && isset($id))
        {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255']
            ]);

            // print_r($_POST);
            $user = User::find($id);
            $user->name = $request->name;
            // $user->email = $request->email;

            $user->title = $request->title;
            $user->phone = $request->phone;
            $user->appellative = $request->appellative;
            $user->birthdate = $request->birthdate;
            $user->uid = $request->uid;
            $user->bank_name = $request->bank_name;
            $user->bank_account = $request->bank_account;
            $user->notes = $request->notes;

            $user->update();

            return redirect(route('user.edit', $id));
        }

        if(isset($_POST['create']))
        {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            
            // print_r($_POST);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make(123456);

            $user->title = $request->title;
            $user->appellative = $request->appellative;
            $user->phone = $request->phone;
            $user->birthdate = $request->birthdate;
            $user->uid = $request->uid;
            $user->bank_name = $request->bank_name;
            $user->bank_account = $request->bank_account;
            $user->notes = $request->notes;

            $user->save();

            // print_r($user);


            return redirect(route('user.edit', $user->id));

        }

        if(isset($_POST['delete']))
        {
            $user = User::find($id);

            $user->delete();

            return redirect(route('user.edit', auth()->id()));

        }
    }

    public function userDelete($id)
    {
        if(isset($_POST['delete']))
        {
            $user = User::find($id);
            $user->delete();
            return redirect(route('user.index'));
        }
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
        // $user = User::find(auth()->id());
        // return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user'=>$user]);
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
