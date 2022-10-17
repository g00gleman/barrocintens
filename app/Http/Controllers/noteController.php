<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class noteController extends Controller
{
    public function index(Request $request)
    {
        $notes = notes::all();
        return view('notes.index', compact('notes'));
    }
    
    public function create()
    {
        return view('notes.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'company_id' => 'required',
            'date' => 'required',
        ]);

        $data = [
            'users_id' => Auth::user()->id,
            'company_id' => $request->company_id ,
            'note' => $request->note ,
            'date' => $request->date,
        ];
        notes::create($data);

        return redirect()->route('note.index')->with('success','note has been created successfully.');
    }

    public function show(notes $note)
    {
        return view('notes.show',compact('note'));
    }

    public function edit(notes $note)
    {
        return view('notes.edit',compact('note'));
    }

    public function update(Request $request, notes $notes)
    {
        $request->validate([
            'note' => 'required',
            'company_id' => 'required',
        ]);
        $notes->where('id',$request->id)->update([
            'note'=>$request->note,
            'company_id'=>$request->company_id,
        ]);

        return redirect()->route('note.index')->with('success','Notitie has Been updated successfully');
    }

    public function destroy(Request $request, notes $notes)
    {
        $notes->where('id',$request->id)->delete();
        return redirect()->route('note.index')->with('success','Notitie has been deleted successfully');
    }
}