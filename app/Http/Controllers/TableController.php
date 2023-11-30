<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\weight;
use App\Models\Criteria;

class TableController extends Controller
{
    public function index()
    {
        $alternative = Alternative::all();
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

        return view('table.index', [
            'title' => 'Table Perhitungan | DSS WP',
            'active' => 'table',
            'alternative' => $alternative,
            'criteria' => $criteria,
            'weight' => $weight,
        ]);
    }
}
