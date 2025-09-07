<?php

namespace App\Http\Controllers;

use App\Models\addCategory;
use App\Models\productList;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product= productList::all();
        return view('backend.products.view',['list'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category= addCategory::all();
        return view('backend.products.add',['list'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $product = new productList();
    $product->name = $request->name;
    $product->price = $request->price; 
    $product->quantity = $request->quantity;
    $product->category=$request->category;
   if ($request->hasFile('image')) {
            $image = $request->file('image');
            $iname = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productimage'), $iname);
            $product->image = $iname;
        }

        $product->description = $request->description;
        $product->save();
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
    $listofproduct = productList::findOrFail($id); // your single product
    $list = addCategory::all();                     // all categories for dropdown
    return view('backend.products.edit', compact('listofproduct', 'list'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
    $p = productList::find($id);
    $p->name = $req->name;
    $p->price = $req->price;
    $p->quantity = $req->quantity;
    $p->category = $req->category;

    if ($req->hasFile('image')) {
        // delete old image if exists
        if ($p->image && file_exists(public_path('productimage/'.$p->image))) {
            unlink(public_path('productimage/'.$p->image));
        }
        $im = $req->file('image');
        $imagename = time() . '.' . $im->getClientOriginalExtension();
        $im->move(public_path('productimage'), $imagename);
        $p->image = $imagename;
    }

    $p->description = $req->description;
    $p->save();

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        productList::destroy($id);
        return redirect()->back();
    }
}
