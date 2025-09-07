<?php

namespace App\Http\Controllers;

use App\Models\addCategory;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=addCategory::all();
        return view('backend.addcategory.view',['list'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.addcategory.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new addCategory();
        $category->category=$request->add;
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=addCategory::find($id);
        return view('backend.addcategory.edit',['list'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cate=addCategory::find($id);
        $cate->category=$request->category;
        $cate->save();
        return redirect()
        ->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        addCategory::destroy($id);
        return redirect()->back();
    }
}
