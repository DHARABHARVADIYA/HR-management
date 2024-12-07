<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(10);
        return view('positions.index', compact('positions'));
    }
    
    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required',
            'position_details' => 'required',
            'status' => 'required',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'position_name' => 'required',
            'position_details' => 'required',
            'status' => 'required',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
