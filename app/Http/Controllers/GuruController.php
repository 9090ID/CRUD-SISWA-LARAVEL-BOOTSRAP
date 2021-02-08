<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function profile($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profile',['guru' => $guru]);
    }
}
