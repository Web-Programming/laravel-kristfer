<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public  function allJoinFacede (){
        $kampus = 'Universtias Multi Data Palembang';
        $result = DB::select('select mahasiswa.*,
        prodi.nama as nama_prodi prodi from prodi, mahasiswa where prodi.id = mahasiswa.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus']);
    }
}
