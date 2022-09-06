<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username'    => 'required|string|min:10' ,
            'username_ar' => 'required|string|min:10',
            'email'       => 'required|email',
            'password'    => 'required|confirmed',
            'image'       => 'required|image',
            'member_type'    => 'required|boolean',

        ]);

        $newPhotoName = time() . '-' . $request->username . '.' . $request->image->extension();

        $request->image->move(public_path('users_photos'), $newPhotoName);

        User::create([

            'name'     => $request->username,
            'name_ar'  => $request->username_ar,
            'email'    => $request->email,
            'password' => Hash::make($request->password), 
            'image'    => $newPhotoName,
            'is_admin' => $request->member_type,
        ]);

        return redirect(route('users.index'))->with('message', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            
            'username'    => 'required|string|min:10' ,
            'username_ar' => 'required|string|min:10',
            'email'       => 'required|email',
            'image'       => 'required|image',
            
        ]);

        if($request->image)
        {
            $user = User::find(Auth::user()->id);

            File::delete('users_photos/'.$user->image);

            $newPhotoName = time() . '-' . $request->username . '.' . $request->image->extension();

            $request->image->move(public_path('users_photos'), $newPhotoName);

            User::where('id', $user->id)->update([

                'name'       => $request->username,
                'name_ar'    => $request->username_ar,
                'email'      => $request->email,
                'image'      => $newPhotoName,

            ]);
        }else
        {
            $user = User::find(Auth::user()->id);

            User::where('id', $user->id)->update([

                'name'       => $request->username,
                'name_ar'    => $request->username_ar,
                'email'     => $request->email,

            ]);
        }

        return redirect()->back()->with('message', 'Profile Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        dd($user);

        File::delete('users_photos/'.$user->image);

        User::destroy($user->id);

        return redirect()->back();
    }


    public function edit_profile()
    {
        $user = Auth::user();

        return view('dashboard.users.edit',compact('user'));
    }


    public function reset_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'password'     => 'required|confirmed'
        ]);

            $id = Auth::user()->id;
            User::where('id', $id)->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
      
    }

    
}
