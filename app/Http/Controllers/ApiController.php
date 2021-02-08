<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {	
    	$siswa = \App\Siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    }
}
