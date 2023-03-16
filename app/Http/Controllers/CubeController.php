<?php

namespace App\Http\Controllers;

use App\Http\Requests\CubeRequest;
use App\Models\Cube;
use App\Models\Part;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CubeController extends Controller
{
    public function index()
    {
        $cubes = Cube::all();
        return view('admin.cubes.index', compact('cubes'));
    }

    public function create()
    {
        $themes = Theme::all();
        return view('admin.cubes.create', compact('themes'));
    }

    public function store(CubeRequest $request)
    {
        $cubes = new Cube();
        $cubes->name = $request->name;
        $cubes->theme_id = $request->theme_id;
        if ($request->hasFile('file')) {
            $cubes->file_path = $request->file->store('cubes', 'public');
        }
        $cubes->save();
        return redirect()->route('admin.cubes.index')->with('message', 'Cube has been successfully created.');
    }

    public function show(cube $cube)
    {
        return view('admin.cubes.show', compact('cube'));
    }

    public function edit(cube $cube)
    {
        $themes = Theme::all();
        return view('admin.cubes.edit', compact('cube', 'themes'));
    }

    public function update(CubeRequest $request, cube $cube)
    {
        $cube->name = $request->name;
        if ($request->hasFile('file') && !isset($request->remove_img)) {
            if (isset($cube->file_path)) Storage::delete($cube->file_path);
            $cube->file_path = $request->file->store('cubes', 'public');
        }
        if (isset($request->remove_img)) {
            Storage::delete($cube->file_path);
            $cube->file_path = NULL;
        }
        $cube->save();
        return redirect()->route('admin.cubes.index')->with('message', 'Cube has been updated.');
    }
    public function delete(cube $cube)
    {
        return view('admin.cubes.delete', compact('cube'));
    }

    public function destroy(cube $cube)
    {
        $cube->delete();
        return redirect()->route('admin.cubes.index')->with('message', 'Cube has been deleted.');
    }

    public function getCubes()
    {
        $cubes = Cube::all();
        return view('home', compact('cubes'));
    }

    public function addparts(Cube $cube)
    {
        $parts = Part::all();
        return view('admin.cubes.addpart', compact('cube', 'parts'));
    }

    public function storeparts(Request $request, Cube $cube)
    {
        $cube->parts()->attach($request->input('part_id'));
        $cube->save();
        return redirect()->route('admin.cubes.show', ['cube' => $cube->id])->with('message', 'Part has been added');
    }

    public function removepart(Cube $cube, Part $part)
    {
        $cube->parts()->detach($part);
        $cube->save();
        return redirect()->route('admin.cubes.show', ['cube' => $cube->id])->with('message', 'Part has been removed');

    }
}
