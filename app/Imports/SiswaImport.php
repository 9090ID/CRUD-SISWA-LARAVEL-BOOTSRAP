<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	
        foreach ($collection as $key => $row) {
        	if($key >= 3){

        	$tanggal_lahir 	= ($row[6] - 25569) * 86400;
        	Siswa::create([
        		'user_id'=>$row[1],
        		'nama_depan'=>$row[2],
        		 'nama_belakang'=> '',
        		'jenis_kelamin'=>$row[3],
        		'agama'=>$row[4],
        		'alamat'=>$row[5],
        		'tgl_lahir'=>gmdate('Y-m-d',$tanggal_lahir),
        	]);

        	}
        	
        }
    }
}
