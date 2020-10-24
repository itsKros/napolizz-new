<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $q = ($request->has('q') && !empty($request->q)) ? strtolower($request->q) : '';

        $queryFood = Category::query();

        if(!empty($q)){
            $queryFood->orWhere('name', 'LIKE', '%'.$q.'%')
                ->orWhere('description', 'LIKE', '%'.$q.'%');
        }

        $categories = $queryFood->paginate(10)->appends(['q'=>$q]);

        return view('backend.categories.index', compact( 'categories', 'page', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            'thumb_url' => 'file|max:1024'
        ]);

        $category = Category::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'thumb_url' => null
        ]);

        if($request->hasFile('thumb_url'))
            $category->thumb_url = $request->file('thumb_url')->storeAs('categories', 'category_'.$category->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if($category->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Category was created successfully!');

            return redirect()->route('backend.categories.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error creating category!');
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
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
            'thumb_url' => 'file|max:1024'
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasFile('thumb_url'))
            $category->thumb_url = $request->file('thumb_url')->storeAs('categories', 'category_'.$category->id.'.'.$request->file('thumb_url')->guessExtension(), 'public_uploads');

        if($category->save()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Category was updated successfully!');

            return redirect()->route('backend.categories.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error updating category!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category && $category->delete()){
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', 'Category was deleted successfully!');

            return redirect()->route('backend.categories.index');
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting category!');
        return redirect()->back();
    }

    public function delete_thumb(Category $category)
    {
        if($category){
            $category->thumb_url = null;
            if($category->save()){
                request()->session()->flash('message.level', 'success');
                request()->session()->flash('message.content', 'Category thumbnail was deleted successfully!');
                return redirect()->back();
            }
        }

        request()->session()->flash('message.level', 'danger');
        request()->session()->flash('message.content', 'Sorry, there was an error deleting category thumbnail!');
        return redirect()->back();
    }
}
