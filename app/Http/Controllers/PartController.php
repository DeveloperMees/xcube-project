<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartRequest;
use App\Models\Part;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $parts = Part::all();
        return view('admin.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.parts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartRequest $request)
    {
        //
        $parts = new Part();
        $parts->name = $request->name;
        $parts->measurement = $request->measurement;
        $parts->weight = $request->weight;
        $parts->category_id = $request->category_id;
        if ($request->hasFile('file')) {
            $parts->file_path = $request->file->store('parts', 'public');
        }
        $parts->save();
        return redirect()->route('admin.parts.index')->with('message', 'Part has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(part $part)
    {
        //
        $categories = Category::all();
        return view('admin.parts.edit', compact('part', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(PartRequest $request, part $part)
    {
        $part->name = $request->name;
        $part->measurement = $request->measurement;
        $part->weight = $request->weight;
        $part->category_id = $request->category_id;
        if ($request->hasFile('file') && !isset($request->remove_img)) {
            if (isset($part->file_path)) Storage::delete($part->file_path);
            $part->file_path = $request->file->store('parts', 'public');
        }
        if (isset($request->remove_img)) {
            Storage::delete($part->file_path);
            $part->file_path = NULL;
        }
        $part->save();
        return redirect()->route('admin.parts.index')->with('message', 'Part has been updated.');
    }

    public function delete(Part $part)
    {
        //
        return view('admin.parts.delete', compact('part'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(part $part)
    {
        $part->delete();
        return redirect()->route('admin.parts.index')->with('message', 'Part has been deleted.');
    }
}
