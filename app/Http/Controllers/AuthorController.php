<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author = Author::all();
        return view('admin.author.index',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);
            $author = new author;
            $author-> name =$request->name;
            $author-> save();
            return redirect()->route('author.index');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
        $author = Author::findOrfail($id);
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $author = Author::findOrfail($id);
        return view('admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->save();
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('author.index');
    }
}
