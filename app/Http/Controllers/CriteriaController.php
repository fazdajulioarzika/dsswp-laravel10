<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\criteria;
use App\Models\weight;

class CriteriaController extends Controller
{
    public function index()
    {
        return view('criteria.index',  [
            'title' => 'Criteria | DSS WP',
            'active' => 'criteria',
            'criteria' => Criteria::paginate(5),
        ]);
    }

    public function create()
    {
        return view('criteria.create', [
            'title' => 'Criteria | DSS WP',
            'active' => 'criteria',
        ]);
    }

    public function edit(Criteria $criteria)
    {
        return view('criteria.edit', [
            'title' => 'Criteria | DSS WP',
            'active' => 'criteria',
            'criteria' => $criteria,
        ]);
    }

    public function update(Request $request, Criteria $criteria)
    {
        $rules = [
            'name' => 'required|max:255',
            'kode_criteria' => 'required',
            'weight' => 'required',
            'type_criteria' => 'required',
        ];

        if ($request->kode_criteria != $criteria->kode_criteria) {
            $rules['kode_criteria'] = 'required|unique:criteria';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kode_criteria'] = strtoupper($validatedData['kode_criteria']);


        Criteria::where('id', $criteria->id)
            ->update($validatedData);
        return redirect('/criteria')->with('success', 'Criteria has been updated!');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'kode_criteria' => 'required|unique:criteria',
            'weight' => 'required',
            'type_criteria' => 'required',

        ]);

        $validatedData['kode_criteria'] = strtoupper($validatedData['kode_criteria']);


        Criteria::create($validatedData);
        return redirect('/criteria')->with('success', 'New criteria has been added!');
    }

    public function destroy(Criteria $criteria)
    {
        // Hapus nilai di tabel weights yang terkait dengan criteria
        Weight::where('criteria_id', $criteria->id)->delete();

        $criteria->delete();
        return redirect('/criteria')->with('success', 'Criteria has been deleted!');
    }


    public function search(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $criteria = Criteria::where('name', 'like', '%' . $search . '%')->paginate(5)->withQueryString();
        } else {
            $criteria = Criteria::paginate(5);
        }
        return view('criteria.index', [
            'title' => 'Criteria | DSS WP',
            'active' => 'criteria',
            'criteria' => $criteria,
        ]);
    }
}
