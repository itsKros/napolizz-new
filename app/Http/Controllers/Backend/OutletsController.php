<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Outlet;
use Illuminate\Http\Request;

class OutletsController extends Controller
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
        $page = ($request->has('page') && $request->page > 1) ? $request->page : 1;
        $active = ($request->has('active') && $request->active > 0) ? $request->active : 0;
        $q = ($request->has('q') && !empty($request->q)) ? strtolower($request->q) : '';

        $queryOutlet = Outlet::query();

        if(!empty($q)){
            $queryOutlet->orWhere('name', 'LIKE', '%'.$q.'%')
                ->orWhere('city', 'LIKE', '%'.$q.'%')
                ->orWhere('state', 'LIKE', '%'.$q.'%')
                ->orWhere('phone', 'LIKE', '%'.$q.'%')
                ->orWhere('postal_code', 'LIKE', '%'.$q.'%')
                ->orWhere('address', 'LIKE', '%'.$q.'%');
        }

        if($active>0){
            $queryOutlet->where('is_active', ($active==2)?1:0);
        }

        $outlets = $queryOutlet->paginate(10)->appends(['q'=>$q, 'active'=>$active]);

        return view('backend.outlets.index', compact( 'outlets', 'page', 'q', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.outlets.create');
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
            'name' => 'required|string|min:3|unique:outlets',
            'city' => 'required|string|min:3',
            'phone' => 'required|string|min:3',
            'state' => 'required|string|min:3',
            'postal_code' => 'required|string|min:3',
            'address' => 'required|string|min:3'
        ]);

        $outlet = Outlet::create([
            'name'=> $request->name,
            'is_active' => $request->has('is_active'),
            'city'=>$request->city,
            'state' => $request->state,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        if($outlet->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Outlet was created successfully!');

            return redirect()->route('backend.outlets.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating outlet!');
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
    public function edit(Outlet $outlet)
    {
        return view('backend.outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:outlets,name,'.$outlet->id,
            'city' => 'required|string|min:3',
            'phone' => 'required|string|min:3',
            'state' => 'required|string|min:3',
            'postal_code' => 'required|string|min:3',
            'address' => 'required|string|min:3'
        ]);

        $outlet->name = $request->name;
        $outlet->is_active = $request->has('is_active');
        $outlet->city = $request->city;
        $outlet->state = $request->state;
        $outlet->phone = $request->phone;
        $outlet->postal_code = $request->postal_code;
        $outlet->address = $request->address;

        if($outlet->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Outlet was update successfully!');

            return redirect()->route('backend.outlets.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating outlet!');
        return redirect()->back();
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
