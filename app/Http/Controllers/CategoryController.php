<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'name'    => 'required|string|min:5|max:50',
            'name_ar' => 'required|string|min:5|max:50',
            'desc'    => 'required|string',
            'desc_ar' => 'required|string',
        ]);


        Category::create([
            'name'    => $request->name,
            'name_ar' => $request->name_ar,
            'desc'    => $request->desc,
            'desc_ar' => $request->desc_ar,
        ]);

        return redirect(route('dashboard.categories.index'))->with('message', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'  => 'required|string|min:5|max:50',
            'name_ar' => 'required|string|min:5|max:50'
        ]);



        Category::where('id',$id)->update([

            'name' => $request->name,
            'name_ar' => $request->name_ar,
        ]);


        return redirect(route('dashboard.categories.index'))->with('message', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
