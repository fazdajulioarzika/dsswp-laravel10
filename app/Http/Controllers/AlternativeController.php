<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use App\Models\Weight;

class AlternativeController extends Controller
{
    public function index()
    {
        return view('alternative.index',  [
            'title' => 'Alternative | DSS WP',
            'active' => 'alternative',
            'alternative' => Alternative::paginate(5),
        ]);
    }

    public function create()
    {
        return view('alternative.create', [
            'title' => 'Alternative | DSS WP',
            'active' => 'alternative',
        ]);
    }

    public function edit(Alternative $alternative)
    {
        return view('alternative.edit', [
            'title' => 'Alternative | DSS WP',
            'active' => 'alternative',
            'alternative' => $alternative,
        ]);
    }

    public function update(Request $request, Alternative $alternative)
    {
        $rules = [
            'name' => 'required|max:255',
            'kode_alternative' => 'required',
        ];

        if ($request->kode_alternative != $alternative->kode_alternative) {
            $rules['kode_alternative'] = 'required|unique:alternative';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kode_alternative'] = strtoupper($validatedData['kode_alternative']);

        Alternative::where('id', $alternative->id)
            ->update($validatedData);
        return redirect('/alternative')->with('success', 'Alternative has been updated!');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'kode_alternative' => 'required|unique:alternative',

        ]);
        $validatedData['kode_alternative'] = strtoupper($validatedData['kode_alternative']);

        Alternative::create($validatedData);
        return redirect('/alternative')->with('success', 'New alternative has been added!');
    }

    public function destroy(Alternative $alternative)
    {
        // Hapus nilai di tabel weights yang terkait dengan alternative
        Weight::where('alternative_id', $alternative->id)->delete();

        // Hapus alternative
        $alternative->delete();

        return redirect('/alternative')->with('success', 'alternative has been deleted!');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $alternative = Alternative::where('name', 'like', '%' . $search . '%')->paginate(5)->withQueryString();
        } else {
            $alternative = Alternative::paginate(5);
        }
        return view('alternative.index', [
            'title' => 'Alternative | DSS WP',
            'active' => 'alternative',
            'alternative' => $alternative,
        ]);
    }
}
