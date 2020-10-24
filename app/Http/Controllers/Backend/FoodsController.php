<?php

namespace App\Http\Controllers\Backend;

use App\Addon;
use App\AddonFood;
use App\Category;
use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodsController extends Controller
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
        $categories = Category::all();

        $page = ($request->has('page') && $request->page > 1) ? $request->page : 1;
        $category_id = ($request->has('category_id') && $request->category_id > 0) ? $request->category_id : 0;
        $active = ($request->has('active') && $request->active > 0) ? $request->active : 0;
        $q = ($request->has('q') && !empty($request->q)) ? strtolower($request->q) : '';

        $queryFood = Food::query();

        if(!empty($q)){
            $queryFood->orWhere('name', 'LIKE', '%'.$q.'%')
                ->orWhere('price', 'LIKE', '%'.$q.'%')
                ->orWhere('description', 'LIKE', '%'.$q.'%')
                ->orWhereHas('category', function($query) use($q){
                    $query->where('name', 'LIKE', '%'.$q.'%');
                });
        }

        if($category_id>0){
            $queryFood->where('category_id', $category_id);
        }

        if($active>0){
            $queryFood->where('is_active', ($active==2)?1:0);
        }

        $foods = $queryFood->paginate(10)->appends(['category_id'=>$category_id, 'active'=>$active, 'q'=>$q]);

        return view('backend.foods.index', compact('foods', 'categories', 'page', 'category_id', 'active', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $addons = Addon::all();

        return view('backend.foods.create',  compact('categories', 'addons'));
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
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
            'category_id' => 'required|numeric|gt:0',
            'thumb_url' => 'file|max:1024'
        ],['category_id.gt'=>'Category must be a valid category', 'price.gt'=>'Price must be greater than 0']);

        $food = Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'thumb_url' => null
        ]);

        if($request->hasFile('thumb_url'))
            $food->thumb_url = $request->file('thumb_url')->storeAs('foods', 'food_'.$food->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        $food->addons()->attach($request->addons_ids);

        if($food->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Food was created successfully!');

            return redirect()->route('backend.foods.index');
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
    public function edit(Food $food)
    {
        $categories = Category::all();
        $addons = Addon::all();

        return view('backend.foods.edit', compact('food', 'categories', 'addons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:foods,name,'.$food->id,
            'price' => 'required|numeric|gt:0',
            'addons_ids' => 'nullable|sometimes|array',
            'addons_ids.*' => 'nullable|sometimes|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|numeric|gt:0',
            'thumb_url' => 'file|max:1024'
        ],['category_id.gt'=>'Category must be a valid category', 'price.gt'=>'Price must be greater than 0']);

        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->category_id = $request->category_id;
        $food->is_active = $request->has('is_active') ? 1 : 0;
        if($request->hasFile('thumb_url'))
            $food->thumb_url = $request->file('thumb_url')->storeAs('foods', 'food_'.$food->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if(count($request->addons_ids)>0)
            $food->addons()->sync($request->addons_ids);

        if($food->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Food was updated successfully!');

            return redirect()->route('backend.foods.index');
        }
        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating food!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if($food && $food->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Food was deleted successfully!');

            return redirect()->route('backend.foods.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting food!');
        return redirect()->back();
    }

    public function delete_thumb(Food $food)
    {
        if($food){
            $food->thumb_url = null;
            if($food->save()){
                request()->session()->flash('message.level', 'success');
                request()->session()->flash('message.content', 'Food thumbnail was deleted successfully!');
                return redirect()->back();
            }
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting food thumbnail!');
        return redirect()->back();
    }
}
