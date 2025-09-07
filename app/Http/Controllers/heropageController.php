<?php

namespace App\Http\Controllers;

use App\Models\dynamic;
use Illuminate\Http\Request;

class heropageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hero = dynamic::all(); // fetch all products
    return view('backend.hero.view', ['list'=>$hero]);
       

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.hero.content');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hero = new dynamic();
    $hero->heading = $request->name;
    $hero->paragraph = $request->textbox;

   if ($request->hasFile('img')) {
            $image = $request->file('img');
            $iname = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('heroimage'), $iname);
            $hero->image = $iname;
        }
        $hero->save();
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
         $hero = dynamic::findOrFail($id);
    return view('backend.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hero = dynamic::findOrFail($id);

    $hero->heading = $request->heading;
    $hero->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        // delete old image
        if ($hero->image && file_exists(public_path('heroimage/'.$hero->image))) {
            unlink(public_path('heroimage/'.$hero->image));
        }
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('heroimage'), $imagename);
        $hero->image = $imagename;
    }

    $hero->save();

    return redirect()->route('herosection.index')->with('success', 'Hero Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         dynamic::destroy($id);
        return redirect()->back();
    }
}
