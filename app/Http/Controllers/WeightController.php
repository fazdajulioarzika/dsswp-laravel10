<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\weight;
use App\Models\Criteria;



class WeightController extends Controller
{
    public function index()
    {
        $alternative = Alternative::paginate(5);
        $criteria = Criteria::all();
        $weight = Weight::all();

        $totalWeight = Criteria::sum('weight');

        foreach ($criteria as $kriteria) {
            // Hitung normalisasi bobot
            $normalizedWeight = $totalWeight > 0 ? $kriteria->weight / $totalWeight : 0;

            if ($kriteria->type_criteria == 'Cost') {
                $normalizedWeight = -$normalizedWeight;
            }


            // Tambahkan field normalized_weight dan exponent ke dalam objek kriteria
            $kriteria->normalized_weight = $normalizedWeight;
        }

        return view('weight.index', [
            'title' => 'Nilai | DSS WP',
            'active' => 'weight',
            'alternative' => $alternative,
            'criteria' => $criteria,
            'weight' => $weight,
        ]);
    }
    public function edit($id)
    {
        $alternative = Alternative::findOrFail($id);
        $criteria = Criteria::all();
        $weight = Weight::where('alternative_id', $id)->get();

        return view('weight.edit', [
            'title' => 'Edit Nilai | DSS WP',
            'active' => 'weight',
            'alternative' => $alternative,
            'criteria' => $criteria,
            'weight' => $weight,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            // Atur validasi sesuai kebutuhan
        ]);

        // Proses untuk menyimpan perubahan nilai
        foreach ($request->input('criteria') as $criteriaId => $nilai) {
            $weight = Weight::where('alternative_id', $id)
                ->where('criteria_id', $criteriaId)
                ->first();

            // Perbarui nilai jika ditemukan, jika tidak, buat baru
            if ($weight) {
                $weight->update(['jum_nilai' => $nilai]);
            } else {
                Weight::create([
                    'alternative_id' => $id,
                    'criteria_id' => $criteriaId,
                    'jum_nilai' => $nilai,
                ]);
            }
        }

        return redirect('/weight')->with('success', 'Nilai berhasil diperbarui');
    }
    public function search(Request $request)
    {
        $criteria = Criteria::all();
        $weight = Weight::all();

        if ($request->has('search')) {
            $search = $request->search;
            $alternative = Alternative::where('name', 'like', '%' . $search . '%')->paginate(5)->withQueryString();
        } else {
            $alternative = Alternative::paginate(5);
        }
        return view('weight.index', [
            'title' => 'Edit Nilai | DSS WP',
            'active' => 'weight',
            'alternative' => $alternative,
            'criteria' => $criteria,
            'weight' => $weight,
        ]);
    }
}
