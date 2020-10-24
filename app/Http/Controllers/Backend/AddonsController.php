<?php

namespace App\Http\Controllers\Backend;

use App\Addon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddonsController extends Controller
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
        $q = ($request->has('q') && !empty($request->q)) ? $request->q : '';

        $queryAddon = Addon::query();

        if(!empty($q)){
            $queryAddon->orWhere('name', 'LIKE', '%'.$q.'%')->orWhere('price', 'LIKE', '%'.$q.'%')->orWhere('description', 'LIKE', '%'.$q.'%');
        }

        if($active>0){
           $queryAddon->where('is_active', '=',($active==2)?1:0);
        }

        $addons = $queryAddon->paginate(10)->appends(['active'=>$active, 'q'=>$q]);

        return view('backend.addons.index', compact('addons','page', 'active', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.addons.create');
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
            'name' => 'required|string|min:3|unique:categories',
            'description' => 'nullable|string',
            'price' => 'required|numeric|gt:0',
            'thumb_url' => 'file|max:1024'
        ]);

        $addon = Addon::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'price' => $request->price,
            'is_active' => $request->has('is_active') ? 1 :0,
            'thumb_url' => null
        ]);

        if($request->hasFile('thumb_url'))
            $addon->thumb_url = $request->file('thumb_url')->storeAs('addons', 'addon_'.$addon->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if($addon->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Addon was created successfully!');

            return redirect()->route('backend.addons.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating Addon!');
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
    public function edit(Addon $addon)
    {
        return view('backend.addons.edit', compact('addon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addon $addon)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:categories,name,'.$addon->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|gt:0',
            'thumb_url' => 'file|max:1024'
        ]);

        $addon->name = $request->name;
        $addon->description = $request->description;
        $addon->price = $request->price;
        $addon->is_active = $request->has('is_active') ? 1 :0;
        if($request->hasFile('thumb_url'))
            $addon->thumb_url = $request->file('thumb_url')->storeAs('addons', 'addon_'.$addon->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if($addon->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Addon was updated successfully!');

            return redirect()->route('backend.addons.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating addon!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addon $addon)
    {
        if($addon && $addon->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Addon was deleted successfully!');

            return redirect()->route('backend.addons.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting addon!');
        return redirect()->back();
    }

    public function delete_thumb(Addon $addon)
    {
        if($addon){
            $addon->thumb_url = null;
            if($addon->save()){
                request()->session()->flash('message.level', 'success');
                request()->session()->flash('message.content', 'Addon thumbnail was deleted successfully!');
                return redirect()->back();
            }
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting addon thumbnail!');
        return redirect()->back();
    }
}
