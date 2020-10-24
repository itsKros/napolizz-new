<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('backend.user.edit');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'password' => 'sometimes|nullable|required_with:password_confirmation|min:8',
            'password_confirmation' => 'sometimes|nullable|min:8'
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        if($request->password !== null) $user->password = bcrypt($request->password);

        if($user->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User has been updated successfully!');
        }else{
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'There was an error updating user!');
        }

        return redirect()->back();
    }
}
