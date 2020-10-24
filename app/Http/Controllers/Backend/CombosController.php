<?php

namespace App\Http\Controllers\Backend;

use App\Addon;
use App\Category;
use App\Combo;
use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CombosController extends Controller
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

        $queryCombo = Combo::query();

        if(!empty($q)){
            $queryCombo->orWhere('name', 'LIKE', '%'.$q.'%')
                ->orWhere('price', 'LIKE', '%'.$q.'%')
                ->orWhere('description', 'LIKE', '%'.$q.'%');
        }

        if($active>0){
            $queryCombo->where('is_active', ($active==2)?1:0);
        }

        $combos = $queryCombo->paginate(10)->appends(['active'=>$active, 'q'=>$q]);

        return view('backend.combos.index', compact('combos', 'page', 'active', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addons = Addon::all();
        $categories = Category::all();

        return view('backend.combos.create', compact('categories', 'addons'));
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
            'name' => 'required|string|min:3|unique:foods',
            'addons_ids' => 'nullable|sometimes|array',
            'addons_ids.*' => 'nullable|sometimes|numeric',
            'foods_ids' => 'nullable|sometimes|array',
            'foods_ids.*' => 'nullable|sometimes|numeric',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
            'thumb_url' => 'file|max:1024'
        ],['price.gt'=>'Price must be greater than 0']);

        $combo = Combo::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'lunch_promotion' => $request->has('lunch_promotion') ? 1 : 0,
            'thumb_url' => null
        ]);

        if($request->hasFile('thumb_url'))
            $combo->thumb_url = $request->file('thumb_url')->storeAs('combos', 'combo_'.$combo->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if(count($request->addons_ids)>0) $combo->addons()->attach($request->addons_ids);
        if(count($request->foods_ids)>0) $combo->foods()->attach($request->foods_ids);

        if($combo->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Combo was created successfully!');

            return redirect()->route('backend.combos.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating food!');
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
    public function edit(Combo $combo)
    {
        $categories = Category::all();
        $addons = Addon::all();

        return view('backend.combos.edit', compact('combo', 'categories', 'addons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combo $combo)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:foods',
            'addons_ids' => 'nullable|sometimes|array',
            'addons_ids.*' => 'nullable|sometimes|numeric',
            'foods_ids' => 'nullable|sometimes|array',
            'foods_ids.*' => 'nullable|sometimes|numeric',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
            'thumb_url' => 'file|max:1024'
        ],['price.gt'=>'Price must be greater than 0']);

        $combo->name = $request->name;
        $combo->price = $request->price;
        $combo->description = $request->description;
        $combo->is_active = $request->has('is_active') ? 1 : 0;
        $combo->lunch_promotion = $request->has('lunch_promotion') ? 1 : 0;
        if($request->hasFile('thumb_url'))
            $combo->thumb_url = $request->file('thumb_url')->storeAs('combos', 'combo_'.$combo->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if(count($request->addons_ids)>0) $combo->addons()->sync($request->addons_ids);
        if(count($request->foods_ids)>0) $combo->foods()->sync($request->foods_ids);

        if($combo->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Combo was updated successfully!');

            return redirect()->route('backend.combos.index');
        }
        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating combo!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Combo $combo)
    {
        if($combo && $combo->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Combo was deleted successfully!');

            return redirect()->route('backend.combos.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting combo!');
        return redirect()->back();
    }

    public function delete_thumb(Combo $combo)
    {
        if($combo){
            $combo->thumb_url = null;
            if($combo->save()){
                request()->session()->flash('message.level', 'success');
                request()->session()->flash('message.content', 'Combo thumbnail was deleted successfully!');
                return redirect()->back();
            }
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting food thumbnail!');
        return redirect()->back();
    }
}
