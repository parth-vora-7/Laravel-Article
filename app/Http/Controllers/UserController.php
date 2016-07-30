<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Http\Requests\UserRequest;
use Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.user', ['user' => Auth::user()]);
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
    public function show(User $user)
    {
        return view('user.user', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        if($request->user()->cannot('update-user', $user)) {
            abort(403);
        }
        return view('user.user-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($request->user()->cannot('update-user', $user)) {
            abort(403);
        }
        $destinationPath = storage_path('app\public\user_pics');
        $fileName = $request->file('user_pic')->getClientOriginalName();
        if($request->hasFile('user_pic')) {
            $user_pic = $request->file('user_pic');
            $user_pic = $user_pic->move($destinationPath, $fileName);
            //$user->user_pic = $user_pic->getFilename();
        }
        
        if($user->update($request->all())) {
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'Your profile has been updated successfully.');
            return redirect('user');
        } else {
            $request->session()->flash('alert-class', 'alert-danger');
            $request->session()->flash('message', 'An error occoured while updating your profile.');
            return redirect()->back();
        }
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
