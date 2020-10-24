<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();

        $page = ($request->has('page') && $request->page > 1) ? $request->page : 1;
        $role_id = ($request->has('role_id') && $request->role_id > 0) ? $request->role_id : 0;
        $q = ($request->has('q') && !empty($request->q)) ? strtolower($request->q) : '';

        $queryUser = User::query();

        if(!empty($q)){
            $queryUser->orWhere('name', 'LIKE', '%'.$q.'%')
                ->orWhere('email', 'LIKE', '%'.$q.'%')
                ->orWhereHas('role', function($query) use($q){
                    $query->where('name', 'LIKE', '%'.$q.'%');
                });
        }

        if($role_id>0){
            $queryUser->where('role_id', $role_id);
        }

        $users = $queryUser->paginate(10)->appends(['role_id'=>$role_id, 'q'=>$q]);

        return view('backend.users.index', compact('users', 'roles', 'page', 'role_id', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:users',
            'role_id' => 'required|numeric|min:2',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ], [
            'role_id.min'=>'The role field is required',
            'role_id.required'=>'The role field is required',
            'password_confirmation.min'=>'The confirm password  must be at least 8 characters'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role_id,
            'password'=>bcrypt($request->password)
        ]);

        if($user){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'User was created successfully!');

            return redirect()->route('backend.users.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating user!');
        return redirect()->back();
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
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'role_id' => 'required|numeric|min:2',
            'password' => 'sometimes|nullable|required_with:password_confirmation|confirmed|min:8',
            'password_confirmation' => 'sometimes|nullable|min:8'
        ], [
            'role_id.min'=>'The role field is required',
            'role_id.required'=>'The role field is required',
            'password_confirmation.min'=>'The confirm password  must be at least 8 characters'
        ]);

        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        if($user->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'User was updated successfully!');

            return redirect()->route('backend.users.index');
        }
        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating user!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user && $user->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'User was deleted successfully!');

            return redirect()->route('backend.users.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting user!');
        return redirect()->back();
    }
}
