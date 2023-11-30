<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Nilai.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = ['jum_nilai', 'criteria_id', 'alternative_id'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternative_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'criteria_id');
    }
}
