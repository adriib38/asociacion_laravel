<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Para mostrar a los miembros se accede a la tabla de usuarios
        $members = User::all();
        return view('members.index', compact('members'));
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
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(User $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $member)
    {
        $request->password = Hash::make($request->get('password'));
        $member->birthday = $request->get('birthday');
        $member->instagram = $request->get('instagram');
        $member->twitter = $request->get('twitter');
        $member->twitch = $request->get('twitch');
        
        if($request->hasFile('photo')) {
           $file = $request->file('photo');
           $destinationPath = 'images/users/';
           $filename = time() . '-' . $file->getClientOriginalName();
           $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
           $member->profile_photo_path = $destinationPath . $filename;
        }

        
        $member->save();
        
        return redirect()->route('members.show', $member);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
